<?php

// JSON Web Token
$app->add(new \Slim\Middleware\JwtAuthentication([
    "path" => "/",
    "passthrough" => ["/token"],
    "logger" => $logger,
    "relaxed" => ["172.21.0.2"],
    "secret" =>  getenv("JWT_SECRET")
]));
