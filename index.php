<?php

use Acquia\Search\Proxy\Response as Response;

/* @var $app \Silex\Application */
$app = require 'bootstrap.php';

/**
 * Homepage
 */
$app->get('/', function () use ($app) {
    return $app->json(array(
        'status'  => 'ok',
        'message' => 'Acquia Search Proxy',
    ));
});

/**
 * Autocomplete
 */
$app->get('/autocomplete/{query}', function ($query) use ($app) {
    return Response\Autocomplete::factory($app)->send($query);
});


$app->run();

