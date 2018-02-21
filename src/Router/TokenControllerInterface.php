<?php
namespace Router;

interface TokenControllerInterface
{
    public function generator($request, $response, $args);
}
