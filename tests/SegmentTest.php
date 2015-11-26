<?php

use CdnSteve\Segment\Segment;


class SegmentTest extends PHPUnit_Framework_TestCase {

  public function testSetAPIKey() {
    Segment::setApiKey('test123');
    $result ='test123';
    $this->assertEquals(Segment::getApiKey(), $result);
  }

}


/*
Analytics::identify([
  'userID' => '1e810c197e',
  'traits' => [
    'name' => 'Bill Lumbergh',
    'email' => 'test@test.ca',
  ],
]);

Analytics::track([
  "userId" => "019mr8mf4r",
  "event" => "Purchased Item",
  "properties" => [
    "revenue" => 39.95,
    "shipping" => "2-day"
  ]
]);
*/