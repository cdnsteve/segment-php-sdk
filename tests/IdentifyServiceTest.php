<?php

use CdnSteve\Segment\Services\IdentifyService;
use CdnSteve\Segment\GuzzleRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class IdentifyServiceTest extends PHPUnit_Framework_TestCase {

  protected $client ;

  protected function setUp()
  {
    // Create a mock and queue response
    $mock = new MockHandler([
      new Response(200, ['success' => 'true']),
      new RequestException("Error Communicating with Server", new Request('GET', 'test'))
    ]);

    $handler = HandlerStack::create($mock);
    $this->client = new Client(['handler' => $handler]);
  }

  public function testIdentifyEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'identify/');

    $params = ['userId'=> '999'];

    $identify = new IdentifyService($apiConnection);
    //$identify->send($params);
    $result = 200;

    $this->assertEquals($identify->send($params), $result);
  }
}

