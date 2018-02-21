<?php
namespace Router;

interface WorkSpaceControllerInterface
{
    public function listAll( \Slim\Http\Request $request, \Slim\Http\Response $response, $args);
    public function add( \Slim\Http\Request $request, \Slim\Http\Response $response, $args);
    public function delete( \Slim\Http\Request $request, \Slim\Http\Response $response, $args);

}
