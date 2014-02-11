<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application;

// @see http://silex.sensiolabs.org/doc/providers/url_generator.html
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// @see http://silex.sensiolabs.org/doc/providers/session.html
$app->register(new Silex\Provider\SessionServiceProvider());

// @see http://silex.sensiolabs.org/doc/providers/monolog.html
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/log/acquia-search.log',
));

return $app;
