<?php
use PHPUnit\Framework\TestCase;

use Router\WorkSpaceController;

class WorkSpaceControllerTest extends TestCase
{
    private $request;
    private $response;
    private $container;

    public function setUp()
    {
        $this->container = $this->createMock('\Interop\Container\ContainerInterface');
        $this->container->db = new \PDO('sqlite::memory:');

        $this->request = $this->createMock('\Slim\Http\Request');
        $this->response = $this->createMock('\Slim\Http\Response');
    }

    public function testShouldListRegisteredWorkSpaces()
    {
        try {
            $controller = new WorkSpaceController( $this->container );
            $result = $controller->listAll( $this->request, $this->response, [] );
        } catch(\Exception $exception){
            $this->assertEquals($exception->getMessage(), "Ocorreu uma falha ao tentar prepara a SQL.");
        }
    }
}
