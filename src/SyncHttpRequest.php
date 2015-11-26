<?php

namespace CdnSteve\Segment;

/**
 * Class SyncHttpRequest
 * @package CdnSteve\Segment
 */
class SyncHttpRequest implements HttpInterface
{
  public $message;
  public $client;
  public $endpoint;

  public function send($client, $endpoint, $message)
  {
    //Send Sync Request
    $this->message = $message;
    $this->client = $client;
    $this->endpoint = $endpoint;

    // Guzzle request
    $response = $this->client->request('POST', $this->endpoint, [
      'json' => $this->message
    ]);

    return $response->getStatusCode();
  }
}