<?php

namespace CdnSteve\Segment;

/**
 * Class AsyncHttpRequest
 * @package CdnSteve\Segment
 */
class AsyncHttpRequest implements HttpInterface
{
  public $message;
  public $client;
  public $endpoint;

  public function send($client, $endpoint, $message)
  {
    //@ TODO setup async requests here.

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