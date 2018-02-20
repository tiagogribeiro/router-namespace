<?php
namespace Router;

use \Interop\Container\ContainerInterface;

class WorkSpaceController implements WorkSpaceControllerInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    
    public function listAll($request, $response, $args)
    {
        $workspace = WorkSpace::createFromEmpty();
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        $results = $repository->listAll();
        if (!$results){
            $results = ["message"=>"Sem resultados."];
        }
        return $response->withJson( $results );
    }

    public function add($request, $response, $args)
    {
        $workspace = WorkSpace::createFrom( $args["name"], $args["server_name"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        if ($repository->save()){

        }
    }

    public function delete($request, $response, $args)
    {
        $workspace = WorkSpace::createFromName( $args["name"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        return $repository->delete();
    }
}
