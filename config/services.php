<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | CMS Backend API Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk koneksi ke CMS backend yang dibuat oleh tim backend.
    | Sesuaikan nilai default dengan environment production.
    |
    */

    'cms' => [
        'base_url' => env('CMS_API_BASE_URL', 'http://localhost:8000/api'),
        'api_key' => env('CMS_API_KEY', ''),
        'timeout' => env('CMS_API_TIMEOUT', 10),
        'cache_ttl' => env('CMS_API_CACHE_TTL', 300), // 5 menit default
    ],

];
