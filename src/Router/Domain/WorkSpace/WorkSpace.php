<?php
namespace Router\Domain\WorkSpace;

use Router\Domain\Entity;

class WorkSpace extends Entity implements WorkSpaceInterface
{
    private $name;
    private $server;

    public static function createFromName( $name )
    {
        return new WorkSpace( $name, "" );
    }

    public static function createFrom( $name, $server )
    {
        return new WorkSpace( $name, $server );
    }

    public static function createFromEmpty()
    {
        return new WorkSpace("", "");
    }

    private function __construct( $name, $server )
    {
        $this->name = $name;
        $this->server = $server;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function __toString()
    {
        return "WorkSpace [name=".$this->name."]";
    }
}
