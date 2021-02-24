<?php

spl_autoload_register(function($class) {

    $paths = [
        '/models/',
        '/components/'
    ];

    foreach ($paths as $path) {
        $path = ROOT . $path . $class . '.php';

        if (is_file($path)) {
            include_once $path;
        }
    }
});

?>