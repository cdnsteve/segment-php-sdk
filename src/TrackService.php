<?php

namespace CdnSteve\Segment;

/**
 * Class TrackService
 * Handle the track endpoint for Segment.
 * @package Segment
 */
class TrackService
{

  const ENDPOINT ='track/';

  /**
   * @anonymousId String, optional.
   * @userId String, required. UserId OR anonymousId required.
   * @event String, required.
   * @context Array, optional.
   * @integrations Array, optional.
   * @timestamp Date, optional.
   * @properties Array, optional.
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
      $validate->track($this->message);

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