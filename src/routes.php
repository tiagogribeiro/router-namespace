<?php
use Router\FinderController;
use Router\WorkSpaceController;
use Router\TokenController;
use Router\InstallController;

// Token
$app->get('/token', TokenController::class . ':generator');

// Install
$app->get('/install', InstallController::class . ':install');

// Finder
$app->get('/finder/{name}', FinderController::class . ':find');

// Workspaces
$app->get('/workspace', WorkSpaceController::class . ':listAll');
$app->put('/workspace', WorkSpaceController::class . ':add');
$app->delete('/workspace/{name}', WorkSpaceController::class . ':delete');
