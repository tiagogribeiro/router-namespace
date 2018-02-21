<?php
namespace Router;

use Router\Infrastructure\TokenGenerator;

class TokenController extends ControllerAbstract implements TokenControllerInterface
{
    public function generator( \Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        return $response->withJson(["auth-token" => TokenGenerator::getToken( $request ) ]);
    }
}
