<?php
namespace Router;

interface FinderControllerInterface
{
    public function find( \Slim\Http\Request $request, \Slim\Http\Response $response, $args);
}
