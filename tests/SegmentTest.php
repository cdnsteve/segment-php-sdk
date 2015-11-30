<?php

use CdnSteve\Segment\Segment;


class SegmentTest extends PHPUnit_Framework_TestCase {

  public function testSetAPIKey() {
    Segment::setApiKey('test123');
    $result ='test123';
    $this->assertEquals(Segment::getApiKey(), $result);
  }

  public function testBaseURL()
  {
    $url = Segment::baseUrl();
    $result = 'https://api.segment.io/v1/';
    $this->assertEquals($url, $result);
  }

  public function testAPIVersion()
  {
    $version = Segment::VERSION;
    $result = '1.0.0';
    $this->assertEquals($version, $result);
  }

}
