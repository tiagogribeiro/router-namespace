<?php
namespace Router\Model\WorkSpace;

use \Interop\Container\ContainerInterface;
use Router\Model\Repository;

class WorkSpaceRepository extends Repository implements WorkSpaceRepositoryInterface
{
    private $workspace;
    private $db;
    private $looger;

    public static function createFrom( WorkSpaceInterface $workspace, ContainerInterface $container )
    {
        return new WorkSpaceRepository( $workspace, $container );
    }

    private function __construct( WorkSpaceInterface $workspace, ContainerInterface $container )
    {
        $this->workspace = $workspace;
        $this->db = $container->db;
        $this->logger = $container->logger;
    }

    public function save()
    {
        $sql = 'INSERT INTO workspace (name,server_name) VALUES (:name,:server)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $this->workspace->getName() );
        $statement->bindParam(':server', $this->workspace->getServer() );
        return $statement->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM workspace WHERE name =:name';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $this->workspace->getName() , \PDO::PARAM_STR );
        return $statement->execute();
    }

    public function listAll()
    {
        $sql = 'SELECT name,server_name FROM workspace';
        $statement = $this->db->prepare( $sql );
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findForName()
    {
        $sql = 'SELECT server_name FROM workspace WHERE name =:name';
        $statement = $this->db->prepare( $sql );
        if ($statement){
            $statement->bindParam(':name', $this->workspace->getName(), \PDO::PARAM_STR );
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function install()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS workspace ('
              .' id INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,'
              .' name TEXT,'
              .' server_name TEXT );'
              .'CREATE INDEX IF NOT EXISTS idxName ON workspace(name);';

        if (!$this->db->exec( $sql )) {
            throw new \Exception( $this->db->errorInfo() );
        }
        return true;
    }

}
