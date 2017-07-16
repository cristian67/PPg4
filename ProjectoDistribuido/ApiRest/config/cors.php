<?php


/*header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: ACCEPT, CONTENT-TYPE, X-CSRF-TOKEN");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
  */  
return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |
     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,
];
