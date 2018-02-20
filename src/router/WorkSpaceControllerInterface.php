<?php
namespace Router;

interface WorkSpaceControllerInterface
{
    public function list($request, $response, $args);
    public function add($request, $response, $args);
    public function delete($request, $response, $args);

}
