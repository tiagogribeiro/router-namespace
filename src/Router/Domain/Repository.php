<?php
namespace Router\Domain;

abstract class Repository
{
    const PREPARE_ERROR = "Ocorreu uma falha ao tentar prepara a SQL.";

    abstract public function install();
    abstract public function save();
    abstract public function delete();
    abstract public function listAll();
}
