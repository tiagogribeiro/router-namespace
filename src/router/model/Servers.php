<?php
namespace \Router;

use \Router\Config\RouterDataCenters;
use \Router\ServersInterface As ServersInterface;

class Servers implements ServersInterface
{

    private final servers;

    public function __construct()
    {
        $this->servers = $servers;
    }

    public function getServers()
    {
        return $this->servers;
    }
}
