<?php
namespace Router\Domain\WorkSpace;

use \Interop\Container\ContainerInterface;
use Router\Domain\Repository;

class WorkSpaceRepository extends Repository implements WorkSpaceRepositoryInterface
{
    private $workspace;
    private $db;

    public static function createFrom( WorkSpaceInterface $workspace, ContainerInterface $container )
    {
        return new WorkSpaceRepository( $workspace, $container->db );
    }

    private function __construct( WorkSpaceInterface $workspace, \PDO $db )
    {
        $this->workspace = $workspace;
        $this->db = $db;
    }

    public function save()
    {
        $sql = 'INSERT INTO workspace (name,server) VALUES (:name,:server)';
        $statement = $this->db->prepare($sql);
        if ($statement){
            $statement->bindParam(':name', $this->workspace->getName() );
            $statement->bindParam(':server', $this->workspace->getServer() );
            return $statement->execute();
        } else {
            throw new \Exception( self::PREPARE_ERROR );
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM workspace WHERE name =:name';
        $statement = $this->db->prepare($sql);
        if ($statement){
            $statement->bindParam(':name', $this->workspace->getName() , \PDO::PARAM_STR );
            return $statement->execute();
        } else {
            throw new \Exception( self::PREPARE_ERROR );
        }
    }

    public function listAll()
    {
        $sql = 'SELECT name,server FROM workspace';
        $statement = $this->db->prepare( $sql );
        if ($statement){
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception( self::PREPARE_ERROR );
        }
    }

    public function findForName()
    {
        $sql = 'SELECT server FROM workspace WHERE name =:name';
        $statement = $this->db->prepare( $sql );
        if ($statement){
            $statement->bindParam(':name', $this->workspace->getName(), \PDO::PARAM_STR );
            $statement->execute();
            return $statement->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception( self::PREPARE_ERROR );
        }
    }

    public function install()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS workspace ('
              .' id INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,'
              .' name TEXT,'
              .' server TEXT );'
              .'CREATE INDEX IF NOT EXISTS idxName ON workspace(name);';

        if (!$this->db->exec( $sql )) {
            return $this->db->errorInfo();
        }
        return true;
    }

}
