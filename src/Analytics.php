<?php

namespace CdnSteve\Segment;
use CdnSteve\Segment\Identify;

/**
 * Class Analytics
 * Acts as primary router for interfacing with Segment API.
 * @package Segment
 */
class Analytics implements ApiInterface
{
  /**
   * Identify endpoint API calls.
   *
   * @param array|null $params
   */
  public static function identify(array $params)
  {
    $identify = new IdentifyService($params);
    $identify->send();
  }

  /**
   * Track endpoint API calls.
   *
   * @param array $params
   */
  public static function track(array $params)
  {
    $track = new TrackService($params);
    $track->send();
  }

  public static function group(array $params)
  {

  }

  public static function alias(array $params)
  {

  }

  public static function page(array $params)
  {

  }
}