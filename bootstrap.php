<?php
require '../vendor/autoload.php';

$config = [
        'log.enable' => true,
        'settings' => [
            'displayErrorDetails' => true
        ]
];

$app = new \Slim\App($config);
$container  = $app->getContainer();
$container['db'] = function($container)
{
    $db = new \PHP\PDO("sqlite:data/namespaceDB.db");
};
