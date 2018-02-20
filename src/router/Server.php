<?php
namespace Router;

class Server implements ServerInterface
{
    private id;
    private name;
    
    public function save()
    {
        $repository = new ServerRespository();
        if ($repository->install()){
            return $repository->save( $this );
        }
    }

    public function get(){
        $repository = new ServerRespository();
        if ($repository->install()){
            return $respository->list();
        }
    }

}
