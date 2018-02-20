<?php
namespace Router;

class WorkSpace implements WorkSpaceInterface
{
    private $name;
    private $server;

    public static function createFromEmpty()
    {
        return new WorkSpace("");
    }

    public static function createFromName( $name )
    {
        return new WorkSpace( $name, "" );
    }

    public static function createFrom( $name, $server )
    {
        return new WorkSpace( $name, $server );
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
}
