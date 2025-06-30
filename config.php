<?php

// Create a DSN string from select env keys
return [ 
    'database' => [
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME'],
        'charset' => $_ENV['DB_CHARSET']
    ],

    // can declare services and tokens here in future

];
