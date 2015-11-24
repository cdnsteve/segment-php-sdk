<?php

namespace CdnSteve\Segment;

interface HttpInterface
{
  public function send($client, $endpoint, $message);

}
