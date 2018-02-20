<?php
namespace Router;

use \Interop\Container\ContainerInterface;

class FinderController implements FinderControllerInterface
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function find($request, $response, $args)
    {
        $workSpace = WorkSpace::createFromName( $args["name"] );
        $result = WorkSpaceRepository::createFrom( $workSpace, $this->container )->findForName();

        if ($result){
            $response = $response->withJson( $result );
        } else {
            $response = $response
                ->withJson(["message"=>"Servidor não encontrado."])
                ->withStatus(503);
        }
        return $response;
    }

}
