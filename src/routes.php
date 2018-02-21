<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Router\FinderController;
use Router\WorkSpaceController;
use Router\TokenController;

// Token
$app->get('/token', TokenController::class . ':generator');

// Finder
$app->get('/finder/{name}', FinderController::class . ':find');

// Workspaces
$app->get('/workspace', WorkSpaceController::class . ':listAll');
$app->put('/workspace', WorkSpaceController::class . ':add');
$app->delete('/workspace/{name}', WorkSpaceController::class . ':delete');
