<?php

namespace CdnSteve\Segment;

class AsyncHttpRequest implements HttpInterface
{
  public $message;
  public $client;
  public $endpoint;

  public function send($client, $endpoint, $message)
  {
    //Send Async Request
    //$promise = $client->requestAsync('GET', 'http://httpbin.org/get');

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