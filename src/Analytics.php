<?php

namespace CdnSteve\Segment;
use CdnSteve\Segment\Services\IdentifyService;
use CdnSteve\Segment\Services\TrackService;
use CdnSteve\Segment\Services\PageService;
use CdnSteve\Segment\Services\GroupService;
use CdnSteve\Segment\Services\AliasService;
use CdnSteve\Segment\Services\ImportService;

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

  /**
   * Page endpoint API calls.
   *
   * @param array $params
   */
  public static function page(array $params)
  {
    $page = new PageService($params);
    $page->send();
  }

  /**
   * Group endpoint API calls.
   *
   * @param array $params
   */
  public static function group(array $params)
  {
    $group = new GroupService($params);
    $group->send();
  }

  /**
   * Alias endpoint API calls.
   *
   * @param array $params
   */
  public static function alias(array $params)
  {
    $alias = new AliasService($params);
    $alias->send();
  }

  /**
   * Import endpoint API calls.
   *
   * @param array $params
   */
  public static function import(array $params)
  {
    $alias = new ImportService($params);
    $alias->send();
  }


}