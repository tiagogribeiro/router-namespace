<?php
namespace Router;

interface ServerInterface
{
    public function get();
    public function save( ServerInterface $server );
}
