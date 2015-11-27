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

  public function __construct($endpoint) // Might need to DI Guzzle $client here
  {
    $this->endpoint = $endpoint;

    // Set Guzzle Client: @TODO need to remove from here?
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