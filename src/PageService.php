<?php

namespace CdnSteve\Segment;

/**
 * Class PageService
 * Handle the page endpoint for Segment.
 * @package Segment
 */
class PageService
{

  const ENDPOINT ='page/';

  /**
   * @anonymousId String, optional.
   * @userId String, required. UserId OR anonymousId required.
   * @context Array, optional.
   * @name String, optional.
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
      $validate->page($this->message);

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