<?php

namespace CdnSteve\Segment;

/**
 * Class Segment
 * Starting point, setup SDK, API key, etc.
 * Every other request will route through Analytics.
 * @package Segment
 */
class Segment
{
  // SDK version
  const VERSION = '1.0.0';

  // Project name
  const PROJECT = 'cdnsteve/segment-php-sdk';

  // @var string Segment API key to be used for requests.
  public static $apiKey;

  // @var string The base URL for the Segment API.
  public static $apiBase = 'https://api.segment.io';

  // @var string|null The version of the Segment API to use for requests.
  public static $apiVersion = 'v1';

  // @var string|null sync or async option for API requests.
  public static $apiSyncType;

  // @var int The Guzzle timeout value for requests.
  public static $timeout;

  /**
   * @return string The API key used for requests.
   */
  public static function getApiKey()
  {
    return self::$apiKey;
  }

  /**
   * Sets the API key to be used for requests.
   *
   * @param string $apiKey
   */
  public static function setApiKey($apiKey)
  {
    self::$apiKey = $apiKey;
  }

  /**
   * @return string The sync type used for requests.
   */
  public static function getSyncType()
  {
    return self::$apiSyncType;
  }

  /**
   * Sets the sync type used for requests.
   * @param \CdnSteve\Segment\HttpInterface object $apiSyncType
   */
  public static function setSyncType(HttpInterface $apiSyncType)
  {
    self::$apiSyncType = $apiSyncType;
  }

  /**
   * Returns the guzzle http timeout value for client.
   * @return int
   */
  public static function getTimeout()
  {
    return self::$timeout;
  }

  /**
   * Sets the guzzle http timeout value for client.
   * @param int $timeout
   */
  public static function setTimeout($timeout)
  {
   self::$timeout = $timeout;
  }

  /**
   * Returns full URL for endpoint base.
   * Must include ending / for Guzzle.
   *
   * @return string the URL for Segments API
   */
  public static function baseUrl()
  {
    return self::$apiBase . '/' . self::$apiVersion . '/';
  }

  /**
   * Sets the configuration options for Segment.
   * @param array $params
   */
  public static function config(array $params)
  {
    self::setApiKey($params['api_key']);

    self::setTimeout($params['timeout']);

    switch($params['sync']) {
      case 'async':
        self::setSyncType(new \CdnSteve\Segment\AsyncHttpRequest());
        break;
      default:
        self::setSyncType(new \CdnSteve\Segment\SyncHttpRequest());
        break;
    }

  }
}
