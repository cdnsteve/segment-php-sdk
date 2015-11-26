<?php

use CdnSteve\Segment\Analytics;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class AnalyticsTest extends PHPUnit_Framework_TestCase
{

  public function testSetAPIKey() {
    $identify = Analytics::identify(['userId'=> 'test123']);
    $this->assertTrue($identify);
  }

}