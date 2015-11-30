<?php

use \CdnSteve\Segment\Validate;

class ValidationTest extends PHPUnit_Framework_TestCase {

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testMissingCommonUserId() {
    $params = ['random' => 'Bob Ross'];
    $validate = new Validate();
    $validate->common($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testMissingCommonAnonymousId() {
    $params = ['abc' => 'Bob Ross'];
    $validate = new Validate();
    $validate->common($params);
  }

  public function testPassCommonAnonymousId() {
    $params = ['anonymousId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->common($params);
  }

  public function testPassCommonUserId() {
    $params = ['userId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->common($params);
  }

  public function testPassIdentify() {
    $params = ['userId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->identify($params);
  }

  /**
 * @expectedException \CdnSteve\Segment\ValidationException
 * @throws \CdnSteve\Segment\ValidationException
 */
  public function testFailIdentifyNoUser() {
    $params = ['random123' => 'Bob Ross'];
    $validate = new Validate();
    $validate->identify($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testFailGroupyNoGroupId() {
    $params = ['random123' => 'Bob Ross'];
    $validate = new Validate();
    $validate->group($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testGroupMissingUserId() {
    $params = ['groupId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->group($params);
  }

  public function testGroupWithUserIdWithGroupId() {
    $params = [
      'groupId' => 'Bob Ross',
      'userId' => 'user1235'
      ];
    $validate = new Validate();
    $validate->group($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testFailTrackNoEvent() {
    $params = ['userId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->track($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testFailTrackEventNoUserId() {
    $params = ['event' => 'Purchase item'];
    $validate = new Validate();
    $validate->track($params);
  }

  public function testTrackWithEventWithUserId() {
    $params = [
      'event' => 'purchase item',
      'userId' => 'user1235'
    ];
    $validate = new Validate();
    $validate->track($params);
  }

  public function testPassPage() {
    $params = ['userId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->page($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testFailAliasNoPreviousId() {
    $params = ['userId' => 'Bob Ross'];
    $validate = new Validate();
    $validate->alias($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testFailAliasPreviousIdNoUserId() {
    $params = ['previousId' => '12345'];
    $validate = new Validate();
    $validate->alias($params);
  }

  public function testTrackWithPreviousWithUserId() {
    $params = [
      'previousId' => '12345',
      'userId' => 'user1235'
    ];
    $validate = new Validate();
    $validate->alias($params);
  }

  /**
   * @expectedException \CdnSteve\Segment\ValidationException
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function testImportBatchMissing() {
    $params = ['previousId' => '12345'];
    $validate = new Validate();
    $validate->import($params);
  }

  public function testImportWithBatch() {
    $params = ['batch' => '12345'];
    $validate = new Validate();
    $validate->import($params);
  }
}
