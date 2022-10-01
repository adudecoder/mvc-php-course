<?php

/**
 * configuration file

 *  __FILE__ - Magic constant. Returns the full path and filename

 *  dirname - Returns the path of the parent directory

 *  define and const - Defines a constant. Constants cannot be changed once declared
 */

define('DB', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASSWORD' => '',
    'DBNAME' => 'base_data_mvc',
    'PORT' => '3306'
]);

define('APP', dirname(__FILE__));
define('URL', 'http://localhost/mvc-php-course');
define('APP_NAME', 'Blog Games');