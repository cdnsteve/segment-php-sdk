<?php

namespace CdnSteve\Segment;

use CdnSteve\Segment\Services\ServiceInterface;
use GuzzleHttp\Client;

class GuzzleRequest implements ServiceInterface
{
  /**
   * Guzzle Client object.
   * @var \GuzzleHttp\Client
   */
  public $client;

  public $endpoint;

  public $message;

  public function __construct(Client $client, $endpoint)
  {
    $this->client = $client;
    $this->endpoint = $endpoint;
  }

  /**
   * Send the message via POST
   * @param array $message the message to post
   * @return object the HTTP status code.
   */
  public function send(array $message)
  {
    // Build message
    $this->message = $message;

    // @TODD add switch for sync or async options

    // Guzzle request, send data to Segment.
    $response = $this->client->request('POST', $this->endpoint, [
      'json' => $this->message
    ]);

    return $response;
  }

}