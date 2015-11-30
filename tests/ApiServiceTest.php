<?php

use CdnSteve\Segment\Services\ApiService;
use CdnSteve\Segment\GuzzleRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class ApiServiceTest extends PHPUnit_Framework_TestCase {

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
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }

  public function testTrackEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'track/');

    $params = ['userId'=> '999'];
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }

  public function testImportEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'import/');

    $params = ['userId'=> '999'];
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }

  public function testPageEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'page/');

    $params = ['userId'=> '999'];
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }

  public function testGroupEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'group/');

    $params = ['userId'=> '999'];
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }

  public function testAliasEndpoint()
  {
    $apiConnection = new GuzzleRequest($this->client, 'alias/');

    $params = ['userId'=> '999'];
    $identify = new ApiService($apiConnection);
    $response = $identify->send($params);
    $result = 200;

    $this->assertEquals($response->getStatusCode(), $result);
  }
}

