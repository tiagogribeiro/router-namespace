<?php
namespace Router;

use Router\Infrastructure\TokenGenerator;

class TokenController extends ControllerAbstract implements TokenControllerInterface
{
    public function generator($request, $response, $args)
    {
        return $response->withJson(["auth-token" => TokenGenerator::getToken( $request ) ]);
    }
}
