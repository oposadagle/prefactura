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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'whapi' => [
        'token' => env('WHAPI_TOKEN'),
        'api_url' => env('WHAPI_API_URL', 'https://gate.whapi.cloud/messages/text'),
    ],

    'infobip' => [
        'base_url' => env('INFOBIP_API_URL'),
        'api_key' => env('INFOBIP_API_KEY'),
        'sender' => env('INFOBIP_SENDER'),
    ],

    'nmv' => [
        'api_url' => env('NMV_API_URL', 'https://testmasivo.nmv.app/api'),
        'username' => env('NMV_API_USERNAME'),
        'password' => env('NMV_API_PASSWORD'),
    ],

];
