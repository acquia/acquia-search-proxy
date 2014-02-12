<?php

use PSolr\Request as Request;

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

/**
 * Autocomplete
 */
$app->get('/autocomplete/{query}', function ($query) use ($app) {

    $result = Request\Suggest::factory()
        ->setQuery($query)
        ->sendRequest($app['acquia.search'])
    ;

    return $app->json(array(
        'status' => 'ok',
        'suggestions' => $result->suggestions(),
        'recommendation' => $result->collation(),
    ));
});


$app->run();

