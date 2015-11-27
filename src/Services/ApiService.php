<?php

namespace CdnSteve\Segment\Services;
use CdnSteve\Segment\ApiRequest;

/**
 * Class IdentifyService
 * Handle the identify endpoint for Segment.
 * @package Segment
 */
class ApiService
{
  /**
   * @var array $message to send to Segment
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

  /**
   * Send the request to the API.
   * @param array $message
   * @return object $res Guzzle response object
   */
  public function send(array $message)
  {
    $this->message = $message;
    $res = $this->apiConnection->send($this->message);
    return $res;
  }
}