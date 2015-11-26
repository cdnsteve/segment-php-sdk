<?php

namespace CdnSteve\Segment;

use GuzzleHttp\Client;

class ApiRequest
{
  /**
   * Guzzle Client object.
   * @var \GuzzleHttp\Client
   */
  public $client;

  public $endpoint;

  public $message;

  public function __construct($endpoint)
  {
    $this->endpoint = $endpoint;

    // Set Guzzle Client
    $this->client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
  }

  public function send(array $message)
  {
    // Build message
    $this->message = $message;
    // Add SDK info for requests.
    $this->message['context']['library'] = [
      'name' => Segment::PROJECT,
      'version' => Segment::VERSION
    ];

    $syncType = Segment::getSyncType();
    return $syncType->send($this->client, $this->endpoint, $this->message);
  }

}