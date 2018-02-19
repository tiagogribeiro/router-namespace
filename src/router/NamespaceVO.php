<?php
/**
* Objeto de valor do namespace
*/
class NamespaceVO
{
    private $name;
    private $server;

    public function __construct( name )
    {
        $this->name = $name;
    }

    public function setServer( $server )
    {
        $this->server = $server;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getServer()
    {
        return $this->server;
    }
}
