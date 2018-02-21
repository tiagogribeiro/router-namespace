<?php
namespace Router;

interface TokenControllerInterface
{
    public function generator( \Slim\Http\Request $request, \Slim\Http\Response $response, $args);
}
