<?php

return array(

    /*
     |--------------------------------------------------------------------------
     | Laravel CORS Defaults
     |--------------------------------------------------------------------------
     |
     | The defaults are the default values applied to all the paths that match,
     | unless overridden in a specific URL configuration.
     | If you want them to apply to everything, you must define a path with *.
     |
     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*') 
     | to accept any value, the allowed methods however have to be explicitly listed.
     |
     */
    'defaults' => array(
        'supportsCredentials' => true,
        'allowedOrigins' => array('*'),
        'allowedHeaders' => array('Content-Type', 'Authorization', 'Accept', 'X-Requested-With', 'Origin'),
        'allowedMethods' => array('POST', 'PUT', 'GET', 'DELETE', 'OPTIONS'),
        'exposedHeaders' => array('*'),
        'maxAge' => 3600,
        'hosts' => array('*')
    ),

    'paths' => array(
        '*' => array(
            'allowedOrigins' => array('*'),
            'allowedHeaders' => array('Content-Type', 'Authorization', 'Accept', 'X-Requested-With', 'Origin'),
            'allowedMethods' => array('POST', 'PUT', 'GET', 'DELETE', 'OPTIONS'),
            'hosts' => array('*')
        ),
    ),

);
