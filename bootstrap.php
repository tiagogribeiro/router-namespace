<?php
require '../vendor/autoload.php';

$config = [
        'log.enable' => true,
        'settings' => [
            'displayErrorDetails' => true,
            'db_path' => 'storage/',
            'log_path' => '../logs/log_application.log'
        ]
];

$app = new \Slim\App($config);

$container  = $app->getContainer();
$container['db'] = function($container)
{
    $path = $container['settings']['db_path'];
    if (!is_writable($path)){
        throw new \Exception('O caminho '.$path.' deve ter permissão para escrita e leitura.');
    }
    return new \PDO('sqlite:' . $path . 'router.sqlite3', '','',[ \PDO::ATTR_PERSISTENT => true ]);
};

$container['logger'] = function($container)
{
    $path = $container['settings']['log_path'];
    $logger = new \Monolog\Logger('log_application');
    $file_handler = new \Monolog\Handler\StreamHandler( $path );
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        $statusCode = $exception->getCode() ? $exception->getCode() : 500;
        $container->logger->critical( $exception );
        return $container['response']->withStatus($statusCode)
            ->withHeader('Content-Type', 'Application/json')
            ->withJson(["message" => $exception->getMessage()], $statusCode);
    };
};

$container['phpErrorHandler'] = function ($container) {
    return function ($request, $response, $error) use ($container) {
        $container->logger->emergency( $exception );
        return $container['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};


// JSON Web Token
$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => "/",
    "passthrough" => ["/token"],
    "logger" => $logger,
    "relaxed" => ["172.21.0.2"],
    "secret" =>  getenv("JWT_SECRET")
]));
