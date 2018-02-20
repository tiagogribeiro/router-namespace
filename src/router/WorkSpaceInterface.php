<?php
namespace Router;

interface WorkSpaceInterface
{
    public static function createFromName($name);
    public static function createFromEmpty();
    public function getName();
    public function getServer();   
}
