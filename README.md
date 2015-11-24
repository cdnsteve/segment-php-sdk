# Segment PHP SDK

PHP SDK for working with the Segment.com analytics API.
Uses PHP namespaces, GuzzleHttp and Composer.

*Please note this is in heavy development and should not yet be used in production.*


## Installation:

`composer install cdnsteve/segment-php-sdk`


## Examples:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use CdnSteve\Segment\Segment;
use CdnSteve\Segment\Analytics;

Segment::setApiKey('YOUR_API_KEY');
// Defaults to AsyncHttpRequest
// Can be changed with:
// Segment::setSyncType(new \CdnSteve\Segment\SyncHttpRequest());

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
