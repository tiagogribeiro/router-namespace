<?php
namespace Router;

use \Interop\Container\ContainerInterface;

abstract class ControllerAbstract
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}
