<?php

namespace CdnSteve\Segment;

/**
 * Class GroupService
 * Handle the track endpoint for Segment.
 * @package Segment
 */
class GroupService
{

  const ENDPOINT ='group/';

  /**
   * @anonymousId String, optional.
   * @userId String, required. UserId OR anonymousId required.
   * @context Array, optional.
   * @integrations Array, optional.
   * @timestamp Date, optional.
   * @properties Array, optional.
   * @traits Array, optional.
   */

  public $message;

  /**
   * Build message and send.
   * @param array $message
   */
  public function __construct(array $message) {
    $this->message = $message;
  }

  public function send()
  {
    try {
      $validate = new Validate();
      $validate->group($this->message);

      $client = new ApiRequest(self::ENDPOINT);
      $res = $client->send($this->message);
      return $res;
    }
    catch(ValidationException $e) {
      // Do Something.
      var_dump($e->getMessage());
    }

  }
}