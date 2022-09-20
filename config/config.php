<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'app_name' => env('GOOGLE_SHEETS_APP_NAME', 'Google Sheets'),
    'scopes' => env('GOOGLE_SHEETS_SCOPES', [\Google\Service\Sheets::SPREADSHEETS]),
    'access_type' => env('GOOGLE_SHEETS_ACCESS_TYPE', 'offline'),
    'auth_config' => env('GOOGLE_SHEETS_AUTH_CONFIG', 'app/credentials.json'),
];
