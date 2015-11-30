<?php

namespace CdnSteve\Segment\Services;

/**
 * Interface ServiceInterface
 * @package CdnSteve\Segment\Services
 */
interface ServiceInterface
{
  public function send(array $message);
}
