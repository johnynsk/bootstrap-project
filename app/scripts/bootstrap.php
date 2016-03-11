<?php

/**
 * PSR-0 autoload
 */
spl_autoload_register(function ($className) {
    $base_dir = __DIR__;

    $file = __DIR__ . str_replace(['\\', '_'], '/', $className) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

