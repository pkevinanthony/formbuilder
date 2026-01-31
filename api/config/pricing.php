<?php

return [
    'plans' => [
        'free' => [
            'name' => 'Free', 'price_monthly' => 0, 'price_yearly' => 0,
            'features' => ['forms' => 3, 'submissions_per_month' => 100, 'file_upload_size' => 5, 'team_members' => 1, 'custom_domain' => false, 'white_label' => false, 'api_access' => false],
        ],
        'starter' => [
            'name' => 'Starter', 'price_monthly' => 19, 'price_yearly' => 190,
            'features' => ['forms' => 10, 'submissions_per_month' => 1000, 'file_upload_size' => 25, 'team_members' => 3, 'custom_domain' => false, 'white_label' => false, 'api_access' => true],
        ],
        'professional' => [
            'name' => 'Professional', 'price_monthly' => 49, 'price_yearly' => 490, 'popular' => true,
            'features' => ['forms' => 50, 'submissions_per_month' => 10000, 'file_upload_size' => 50, 'team_members' => 10, 'custom_domain' => true, 'white_label' => true, 'api_access' => true],
        ],
        'enterprise' => [
            'name' => 'Enterprise', 'price_monthly' => 149, 'price_yearly' => 1490,
            'features' => ['forms' => -1, 'submissions_per_month' => -1, 'file_upload_size' => 100, 'team_members' => -1, 'custom_domain' => true, 'white_label' => true, 'api_access' => true, 'sso' => true],
        ],
    ],
    'currency' => 'USD',
    'trial' => ['enabled' => true, 'days' => 14, 'plan' => 'professional'],
];
