# Segment PHP SDK

PHP SDK for working with the Segment.com analytics API.
Uses PHP namespaces, GuzzleHttp and Composer.

[![Build Status](https://travis-ci.org/cdnsteve/segment-php-sdk.svg?branch=master)](https://travis-ci.org/cdnsteve/segment-php-sdk)

*Please note this is in heavy development and should not yet be used in production.*


## Installation:

`composer require cdnsteve/segment-php-sdk`


## Examples:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use CdnSteve\Segment\Segment;
use CdnSteve\Segment\Analytics;

Segment::config([
  'api_key' => 'YOUR_API_KEY',
  'timeout' => 2.0, // HTTP request in seconds.
  ]);

// Setup unique identity to track.
Analytics::identify([
  'userId'=> '5114'
]);

// Track it!
Analytics::track([
  'userId'=> '5114',
  'event' => 'Purchase item',
  'properties' => [
    'product' => 'Solution 10',
    'premium_frequency' => 'monthly',
    'insurance_coverage' => 250000,
    'premium' => 50.35,
  ]
]);
```

## License:

MIT License