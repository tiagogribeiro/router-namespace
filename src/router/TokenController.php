<?php
namespace Router;

class TokenController implements TokenControllerInterface
{
    public function generator($request, $response, $args)
    {
        return $response->withJson(["auth-token" => TokenGenerator::getToken( $request ) ]);
    }
}
