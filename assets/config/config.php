<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
define('ENV', 'dev');

// store database credentials in a global variable
$CONFIG = [
    'dev' => [
        'dbName'    => 'visualizr',
        'user'      => 'root',
        'password'  => 'root' //todo remove password
    ],
];
