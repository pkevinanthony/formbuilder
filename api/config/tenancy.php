<?php

return [
    'central_domain' => env('TENANT_CENTRAL_DOMAIN', 'app.formbuilder.local'),
    'central_domains' => explode(',', env('TENANT_CENTRAL_DOMAINS', 'formbuilder.local,app.formbuilder.local')),
    'reserved_subdomains' => ['www', 'api', 'admin', 'app', 'mail', 'smtp', 'ftp', 'cdn'],
    'trial_days' => env('TENANT_TRIAL_DAYS', 14),
    'custom_domains' => ['enabled' => true, 'verification_prefix' => '_formbuilder-verify'],
    'default_branding' => ['primary_color' => '#3B82F6', 'secondary_color' => '#10B981', 'font_family' => 'Inter'],
];
