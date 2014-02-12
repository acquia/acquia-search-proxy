<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application;

$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . '/conf/config.yml', array(
    'root_dir' => __DIR__,
)));

// @see http://silex.sensiolabs.org/doc/providers/monolog.html
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/log/acquia-search.log',
));

$app->register(new Acquia\Search\Proxy\AcquiaSearchIndexProvider());

return $app;
