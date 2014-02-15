<?php

use Acquia\Search\Proxy\Console as Console;
use Symfony\Component\Console\Application;

// Try to find the appropriate autoloader.
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
} elseif (__DIR__ . '/../../../autoload.php') {
    require __DIR__ . '/../../../autoload.php';
} else {
    throw new RuntimeException('Autoloader not found');
}

$app = new Application();
$app->add(new Console\AuthIndexesCommand());
$app->run();
