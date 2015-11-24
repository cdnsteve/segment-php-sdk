<?php

use Segment\IdentifyService;

class IdentifyServiceTest extends PHPUnit_Framework_TestCase {

  public function testUserIdExists() {
    $identify = new IdentifyService(['userId'=> 'test123']);

    $this->assertTrue($identify);
  }

}