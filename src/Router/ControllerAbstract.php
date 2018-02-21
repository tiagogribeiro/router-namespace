<?php
namespace Router;

abstract class ControllerAbstract
{
    protected $container;

    public function __construct( \Interop\Container\ContainerInterface $container)
    {
        $this->container = $container;
    }
}
