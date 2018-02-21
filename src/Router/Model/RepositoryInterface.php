<?php
namespace Router\Model;

interface RepositoryInterface
{
    public function install();
    public function save();
    public function delete();
    public function listAll();
}
