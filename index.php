<?php

/* @var $app \Silex\Application */
$app = require 'bootstrap.php';

/**
 * Homepage
 */
$app->get('/', function () use ($app) {
    return $app->json(array(
        'status' => 'ok',
        'message' => 'Acquia Search Proxy',
    ));
});

$app->run();
