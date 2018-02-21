<?php
namespace Router\Model;

abstract class Repository
{
    abstract public function install();
    abstract public function save();
    abstract public function delete();
    abstract public function listAll();
}
