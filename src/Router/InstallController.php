<?php
namespace Router;

use Router\Domain\WorkSpace\WorkSpaceRepository;
use Router\Domain\WorkSpace\WorkSpace;

class InstallController extends ControllerAbstract
{
    public function install($request, $response, $args)
    {
        $workspace = WorkSpace::createFromEmpty();
        $repository = WorkSpaceRepository::createFrom( $workspace, $this->container );
        $status = $repository->install();        
        if ($status){
            return $response->withStatus(200);
        } else {
            $this->container->logger->error( $status );
            return $response->withStatus(501);
        }
    }
}
