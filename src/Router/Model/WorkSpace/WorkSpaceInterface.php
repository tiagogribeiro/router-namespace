<?php
namespace Router\Model\WorkSpace;

interface WorkSpaceInterface
{
    public static function createFromName($name);
    public static function createFromEmpty();
    public function getName();
    public function getServer();
}
