<?php

use Segment\Analytics;

class AnalyticsTest extends PHPUnit_Framework_TestCase {

  public function testSetAPIKey() {
    $identify = Analytics::identify(['userId'=> 'test123']);
    $this->assertTrue($identify);
  }

}