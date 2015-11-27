<?php

namespace CdnSteve\Segment\Services;
use CdnSteve\Segment\ApiRequest;

/**
 * Class IdentifyService
 * Handle the identify endpoint for Segment.
 * @package Segment
 */
class IdentifyService
{

  /**
	* @anonymousId String, optional.
  * @userId String, required. UserId OR anonymousId required.
	* @context Array, optional.
	* @integrations Array, optional.
	* @timestamp Date, optional.
	* @traits Array, optional.
	*/
  public $message;

  /**
   * @var ServiceInterface
   */
  private $apiConnection;

  /**
   *
   * @param \CdnSteve\Segment\Services\ServiceInterface $apiConnection
   */
	public function __construct(ServiceInterface $apiConnection) {
    $this->apiConnection = $apiConnection;
	}

  public function send(array $message)
  {
    $this->message = $message;
    try {
      $res = $this->apiConnection->send($this->message);
      return $res;
    }
    catch(ValidationException $e) {
      // Do Something.
      // var_dump($e->getMessage());
    }

  }
}