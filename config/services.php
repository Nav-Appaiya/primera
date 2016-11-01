<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1604113266560407',
        'client_secret' => 'a4a5b56e7a7e69bfd49b4710c399b0a2',
        'redirect' => 'http://www.esigareteindhoven.com/callback',
    ],
    'mollie' => [
         'client_id'     => env('MOLLIE_CLIENT_ID', 'app_xxx'),
         'client_secret' => env('MOLLIE_CLIENT_SECRET'),
         'redirect'      => env('MOLLIE_REDIRECT_URI'),
     ],
];
