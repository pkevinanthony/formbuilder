<?php

return [
    'api_key' => env('NMI_API_KEY', ''),
    'tokenization_key' => env('NMI_TOKENIZATION_KEY', ''),
    'test_mode' => env('NMI_TEST_MODE', true),
    'webhook_secret' => env('NMI_WEBHOOK_SECRET', ''),
    'endpoints' => [
        'transaction' => 'https://secure.networkmerchants.com/api/transact.php',
        'query' => 'https://secure.networkmerchants.com/api/query.php',
    ],
];
