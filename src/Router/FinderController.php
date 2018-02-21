<?php
namespace Router;

use Router\Domain\WorkSpace\WorkSpace;
use Router\Domain\WorkSpace\WorkSpaceRepository;

class FinderController extends ControllerAbstract implements FinderControllerInterface
{

    public function find( \Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $workSpace = WorkSpace::createFromName( $args["name"] );
        $result = WorkSpaceRepository::createFrom( $workSpace, $this->container )->findForName();

        if ($result){
            $response = $response->withJson( $result );
        } else {
            $response = $response->withJson(["message"=>"Servidor não encontrado."])->withStatus(503);
        }
        return $response;
    }

}
