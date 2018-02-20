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
