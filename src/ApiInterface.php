<?php

namespace CdnSteve\Segment;

interface ApiInterface
{
  public static function alias(array $params);

  public static function identify(array $params);

  public static function track(array $params);

  public static function page(array $params);

  public static function group(array $params);
}
