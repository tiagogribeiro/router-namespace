<?php
namespace Router;

class WorkSpaceController implements WorkSpaceControllerInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function list($request, $response, $args)
    {
        $workspace = WorkSpace::createFromEmpty();
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->controller );
        return $reponse->withJson( $repository->listAll() );
    }

    public function add($request, $response, $args)
    {
        $workspace = WorkSpace::createFrom( $args["name"], $args["server_name"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->controller );
        return $repository->save();
    }

    public function delete($request, $response, $args)
    {
        $workspace = WorkSpace::createFromName( $args["name"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->controller );
        return $repository->delete();
    }
}
