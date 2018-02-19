<?php
namespace Router;

use \Interop\Container\ContainerInterface as ContainerInterface;
use \Router\FinderControllerInterface As FinderControllerInterface;

class FinderController implements FinderControllerInterface
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function find($request, $response, $args)
    {
        return "aquiii" . $args["namespace"];
    }

}
