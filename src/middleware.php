<?php

// JSON Web Token
$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => "/",
    "logger" => $logger,
    "relaxed" => ["172.21.0.2"],
    "secret" =>  getenv("JWT_SECRET"),
    "passthrough" => ["/token"]
]));

// Basic Autentication
$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => ["/token"],
    "relaxed" => ["172.21.0.2"],
    "users" => [ "wm-router" => "9E9v3*i5^GW8" ],
    "passthrough" => [],
]));
