<?php
use PHPUnit\Framework\TestCase;

class WorkSpaceTest extends TestCase
{
    const NAME = "test";
    const SERVER = "server";

    private $workspace;

    public function setUp()
    {
        $this->workspace = Router\Domain\WorkSpace\WorkSpace::createFrom( self::NAME, self::SERVER );
    }

    public function testGetNameNoError()
    {
        $this->assertEquals($this->workspace->getName(), self::NAME);
    }

    public function testGetServerNoError()
    {
        $this->assertEquals($this->workspace->getServer(), self::SERVER);
    }

    public function testGetNameEmpty()
    {
        $workspace = Router\Domain\WorkSpace\WorkSpace::createFromEmpty();
        $this->assertEquals($workspace->getName(), "");
    }

    public function testGetServerEmpty()
    {
        $workspace = Router\Domain\WorkSpace\WorkSpace::createFromEmpty();
        $this->assertEquals($workspace->getServer(), "");
    }

}
