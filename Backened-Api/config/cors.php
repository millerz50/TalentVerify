<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | This determines what cross-origin operations may execute in web browsers.
    | Adjust these settings based on your specific needs.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Paths that should allow CORS

    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, OPTIONS, etc.)

    'allowed_origins' => ['http://localhost:3000'], // Only allow your frontend origin

    'allowed_origins_patterns' => [], // No patterns are needed here

    'allowed_headers' => ['*'], // Allow all headers (e.g., Content-Type, Authorization)

    'exposed_headers' => [], // No headers are exposed

    'max_age' => 0, // Disable caching for preflight requests

    'supports_credentials' => false, // Cookies are not allowed in requests

];




