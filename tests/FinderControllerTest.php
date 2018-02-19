<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class FinderControllerTest extends TestCase
{
    public function setUp()
    {
        $this->http = new Client(['base_uri'=>'http://172.21.0.2/']);
    }

    public function testExistServiceInURI()
    {
        $response = $this->http->request('GET','/public/finder/',['http_errors' => false]);
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testResponseForServiceFinderOfNamespace()
    {
        $response = $this->http->request('GET','/public/finder/JJ1');
        $this->assertEquals(200, $response->getStatusCode());
    }

}
