<?php

return [
    'header_key' => env('KERBEROS_HEADER_KEY', 'X-REMOTE-USER'),
    'model'      => env('KERBEROS_MODEL', \App\Models\User::class),
    'identifier' => env('KERBEROS_IDENTIFIER', 'email'),
    'enabled'    => env('KERBEROS_ENABLED', false),
];
