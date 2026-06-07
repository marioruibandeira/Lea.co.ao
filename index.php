<?php

//
spl_autoload_register(function($class) {
    $paths = [
        'app/core/',
        'app/controllers/',
        'app/models/',
        'app/dao/',
        'app/dao/interfaces/',
        'config/'
    ];
    foreach ($paths as $path){
        $file = $path . $class . '.php';
        if(file_exists($file)){
            require_once $file;
            return;
        }
    }
});

session_start();

require_once 'app/core/Router.php';

$router = new Router();
$router->dispatch();