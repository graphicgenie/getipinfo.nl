<?php

return [
    env('STRIPE_PROD_BASIC') => [
        'order' => 0,
        'name' => 'Basic',
        'id' => 'tier-basic',
        'route' => 'stripe-basic',
        'credits' => 10000,
        'period' => 'month',
        'price' => ['monthly' => 9, 'annually' => 100],
        'features' => ['Unlimited IP lookups', '10000 GeoIP request per month', 'Includes ASN', 'Basic support'],
        'stripe_id' => env('STRIPE_PROD_BASIC'),
        'mostPopular' => false,
        'description' => '',

    ],
    env('STRIPE_PROD_STANDARD') => [
        'order' => 1,
        'name' => 'Standard',
        'id' => 'tier-standard',
        'route' => 'stripe-standard',
        'credits' => 50000,
        'period' => 'month',
        'price' => ['monthly' => 25, 'annually' => 255],
        'features' => ['Unlimited IP lookups', '50000 GeoIP request per month', 'Includes ASN', 'Basic support'],
        'stripe_id' => env('STRIPE_PROD_BASIC'),
        'mostPopular' => true,
        'description' => '',
    ],
    env('STRIPE_PROD_BUSINESS') => [
        'order' => 2,
        'name' => 'Business',
        'id' => 'tier-business',
        'route' => 'stripe-business',
        'credits' => 200000,
        'period' => 'month',
        'price' => ['monthly' => 89, 'annually' => 949],
        'features' => ['Unlimited IP lookups', '200000 GeoIP request per month', 'Includes ASN', 'Premium support'],
        'stripe_id' => env('STRIPE_PROD_BUSINESS'),
        'mostPopular' => true,
        'description' => '',
    ]
];
