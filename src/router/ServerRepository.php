<?php
namespace Router;

class NamespaceRepository implements RepositoryInterface
{
    public function save( ServerInterface $server )
    {
        $sql = 'INSERT INTO server (id,name) VALUES (:id,:name)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $server->id );
        $statement->bindParam(':name', $server->name );
        return $statement->execute();
    }

    public function list()
    {
        $sql = 'SELECT id,name FROM server';
        return $this->db->query( $sql );
    }

    public function install()
    {
        $sql = 'CREATE TABLE IF NOS EXISTS server ('
              .' id INTEGER PRIMARY KEY,'
              .' name TEXT)';
        return $this->db->exec( $sql );
    }
}
