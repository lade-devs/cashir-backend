<?php

return [
    'timeout' => env('PAYMENT_PROVIDER_PING_TIMEOUT', 5),
    'tries' => env('PAYMENT_PROVIDER_TRIES', 3),
    'PayStackService_ping_url' => 'https://kodedict.com',
    'FlutterWaveService_ping_url' => '',
    'flutterwave_api_key' => env('FLUTTTERWAVE_API_KEY'),
    'paystack_api_key' => env('PAYSTACK_API_KEY'),
];
