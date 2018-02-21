<?php
namespace Router;

class TokenController implements TokenControllerInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function generator($request, $response, $args)
    {
        return $response->withJson(["auth-token" => TokenGenerator::getToken( $request ) ]);
    }
}
