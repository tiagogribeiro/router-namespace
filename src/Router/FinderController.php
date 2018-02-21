<?php
namespace Router;

use Router\Model\WorkSpace\WorkSpace;
use Router\Model\WorkSpace\WorkSpaceRepository;

class FinderController extends ControllerAbstract implements FinderControllerInterface
{

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
