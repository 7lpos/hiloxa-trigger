<?php

return [
    'from' => env('APP_NAME', 'Hiloxa Trigger'),
    /*
     * Which base URL to use for trigger.
     */
    'base_url' => env('HILOXA_TRIGGER_BASE_URL', 'https://rest.gohighlevel.com/v1'),
    'api_key' => env('HILOXA_TRIGGER_API_KEY'),
    'trigger' => [
        'create' => true,
        'update' => true,
    ],
    'model_data' => \HL\HiloxaTrigger\DTO\CreateDTO::class
];
