<?php

namespace CdnSteve\Segment;
use CdnSteve\Segment\Services\ApiService;
use GuzzleHttp\Client;

/**
 * Class Analytics
 * Acts as primary router for interfacing with Segment API.
 * @package Segment
 */
class Analytics implements ApiInterface
{
  /**
   * Identify API endpoint.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function identify(array $params)
  {
    $validate = new Validate();
    $validate->identify($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'identify/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }

  /**
   * Track endpoint API calls.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function track(array $params)
  {
    $validate = new Validate();
    $validate->track($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'track/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }

  /**
   * Page endpoint API calls.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function page(array $params)
  {
    $validate = new Validate();
    $validate->page($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'page/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }

  /**
   * Group endpoint API calls.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function group(array $params)
  {
    $validate = new Validate();
    $validate->group($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'group/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }

  /**
   * Alias endpoint API calls.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function alias(array $params)
  {
    $validate = new Validate();
    $validate->alias($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'alias/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }

  /**
   * Import endpoint API calls.
   *
   * @param array $params message to send to Segment
   * @return object Guzzle response object
   */
  public static function import(array $params)
  {
    $validate = new Validate();
    $validate->import($params);
    $message = $validate->addLibraryInfo($params);

    // Initialize Guzzle
    $client = new Client([
      'base_uri' => Segment::baseUrl(),
      'timeout'  => Segment::getTimeout(),
      'auth' => [Segment::getApiKey(), ':']
    ]);
    $apiConnection = new GuzzleRequest($client, 'import/');
    $identify = new ApiService($apiConnection);
    return $identify->send($message);
  }


}