<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => ['*'],

    'allowed_headers' => ['*'],

    'Access_Control_Allow_Methods' => ['*'],
    'Access-Control-Allow-Methods' => ['*'],
    'Access_Control_Allow_Origin' => ['http://127.0.0.1:3000'],
    'Access-Control-Allow-Origin' => ['http://127.0.0.1:3000'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
    'hosts' => ['*'],
];
