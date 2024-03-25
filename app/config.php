<?php

//Configuration files

// _FILE_ : Magic constant. Returns the full path and file name dirname - returns the path of the parent directory

// define or const: Define a constant. Constants cannot be changed once they are declared

define('DB', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASSWORD' => '',
    'DATABASE' => 'framework',
    'DOOR' => '3306'
]);

define('app', dirname(__FILE__));

define('url', 'http://mvc/framework');

define('app_name', 'MVC studies and object oriented');
