<?php

return [

    'paths' => ['api/*', '*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // ou coloque o IP/porta do Vue ex: ['http://localhost:5173']

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];