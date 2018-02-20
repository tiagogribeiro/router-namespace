<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Router\FinderController;
use Router\WorkSpaceController;
use Router\ServerController;

require '../bootstrap.php';

// Finder
$app->get('/finder/{name}', FinderController::class . ':find');

// Namespace
$app->get('/workspace', WorkSpaceController::class . ':list');
$app->put('/workspace', WorkSpaceController::class . ':add');
$app->delete('/workspace/{id}', WorkSpaceController::class . ':delete');

// Server
$app->get('/server', ServerController::class . ':list');
$app->put('/server', ServerController::class . ':add');
$app->delete('/server/{id}', ServerController::class . ':delete');

$app->run();
