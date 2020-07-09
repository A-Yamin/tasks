<?php

/**
 * Autoload classes
 */
spl_autoload_register(function ($class_name)
{
    // Array of folders with necessary classes
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    foreach ($array_paths as $path) {

        // path to class
        $path = ROOT . $path . $class_name . '.php';

        // if class file exists include
        if (is_file($path)) {
            include_once $path;
        }
    }
});
