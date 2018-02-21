<?php
namespace Router\Model\WorkSpace;

interface WorkSpaceRepositoryInterface
{
    public function save();
    public function delete();
    public function listAll();
    public function install();
    public function findForName();
}
