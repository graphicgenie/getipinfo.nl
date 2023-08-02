<?php

return [
    'account_id' => env('MAXMIND_ACCOUNT_ID'),
    'license_key' => env('MAXMIND_LICENSE_KEY'),
    'host' => env('MAXMIND_HOST', 'geoip.maxmind.com'),
    'lang' => env('MAXMIND_LANG', 'en')
];
