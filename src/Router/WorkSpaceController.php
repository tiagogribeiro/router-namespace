<?php
namespace Router;

use \Interop\Container\ContainerInterface;
use Router\Domain\WorkSpace\WorkSpace;
use Router\Domain\WorkSpace\WorkSpaceRepository;

class WorkSpaceController extends ControllerAbstract implements WorkSpaceControllerInterface
{

    public function listAll( \Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $workspace = WorkSpace::createFromEmpty();
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        $results = $repository->listAll();
        if (!$results){
            $response->withStatus(204);
        }
        return $response->withJson( $results );
    }

    public function add( \Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $data = $request->getParsedBody();
        $workspace = WorkSpace::createFrom( $data["name"], $data["server"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        if (!$repository->save()){
            $message = "Não foi possível registrar o novo workspace.";
            $this->container->logger->error($message, $data);
            throw new \Exception($message);
        } else {
            $this->container->logger->info('Novo workspace adicionado.', $data);
            return $response->withJson( $data , 201 )
                ->withHeader('Content-Location','/finder/'.$data["name"]);
        }
    }

    public function delete( \Slim\Http\Request $request, \Slim\Http\Response $response, $args)
    {
        $workspace = WorkSpace::createFromName( $args["name"] );
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        if (!$repository->delete()){
            $message = "Não foi possível deletar o workspace.";
            $this->container->logger->error($message, $args);
            throw new \Exception($message);
        } else {
            $this->container->logger->info('O workspace foi removido.', $args);
            return $response->withJson( ['message'=>'Registro deletado.'] );
        }
    }
}
