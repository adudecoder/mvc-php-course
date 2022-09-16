<?php

spl_autoload_register(function($class) {

    $directories = [
        'Lib',
        'Helpers'
    ];

    foreach ($directories as $directory) {

        $file = (__DIR__.DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR.$class.'.php');

       if(file_exists($file)){
            require_once ($file);
       }
    }

});