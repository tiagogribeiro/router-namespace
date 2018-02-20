<?php
namespace Router;

use \Interop\Container\ContainerInterface;

class WorkSpaceRepository implements RepositoryInterface
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
        $sql = 'INSERT INTO workspace (id,name,server_name) VALUES (:id,:name,:server_name)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $this->workspace->getName() );
        $statement->bindParam(':server_name', $this->workspace->getServer() );
        return $statement->execute();
    }

    public function delete()
    {
        $sql = 'DELETE workspace WHERE name = :name';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':name', $this->workspace->getName() );
        return $statement->execute();
    }

    public function listAll()
    {
        $sql = 'SELECT name,server_name FROM server';
        return $this->db->query( $sql );
    }

    public function findForName()
    {
        $sql = 'SELECT server_name FROM workspace WHERE name =:name';
        $statement = $this->db->prepare( $sql );

        echo "-->".$this->workspace->getName();

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
