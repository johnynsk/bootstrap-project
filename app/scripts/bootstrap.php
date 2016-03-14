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

define('ROOT_DIR', dirname(__DIR__));
define('COMPOSER_PATH', implode([ROOT_DIR, 'vendors' . 'autoload.php'], DIRECTORY_SEPARATOR));

if (!file_exists(COMPOSER_PATH)) {
    throw new Exception('you need to run "composer install" command');
}

require COMPOSER_PATH;