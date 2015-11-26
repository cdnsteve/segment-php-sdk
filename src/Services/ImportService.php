<?php

namespace CdnSteve\Segment\Services;
use CdnSteve\Segment\Validate;
use CdnSteve\Segment\ApiRequest;

/**
 * Class ImportService
 * Handle the alias endpoint for Segment.
 * @package Segment
 */
class ImportService implements ServiceInterface
{

  const ENDPOINT ='import/';

  /**
   * @batch Array, required. Each call must include.
   * @context Array, optional.
   * @integrations Array, optional.
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
      $validate->import($this->message);

      $client = new ApiRequest(self::ENDPOINT);
      $res = $client->send($this->message);
      return $res;
    }
    catch(ValidationException $e) {
      // Do Something.
      // var_dump($e->getMessage());
    }

  }
}