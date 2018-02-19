<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Router\FinderController As FinderController;

require '../bootstrap.php';

// Finder
$app->get('/finder/{namespace}', FinderController::class . ':find');

// Namespace
$app->get('/namespace', NamespacerController::class . ':list');
$app->put('/namespace', NamespacerController::class . ':add');
$app->delete('/namespace/{id}', NamespaceController::class . ':delete');

// Server
$app->get('/server', ServerController::class . ':list');
$app->put('/server', ServerController::class . ':add');
$app->delete('/server/{id}', ServerController::class . ':delete');

$app->run();
