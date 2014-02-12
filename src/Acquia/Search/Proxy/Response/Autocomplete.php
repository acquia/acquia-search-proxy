<?php

namespace Acquia\Search\Proxy\Response;

/**
 * @method \Acquia\Search\Proxy\Response\Autocomplete factory(\Silex\Application $app)
 */
class Autocomplete extends Response
{
    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function send($query)
    {
        $result = Request\Suggest::factory()
            ->setQuery($query)
            ->sendRequest($this->app['acquia.search'])
        ;

        return $this->app->json(array(
            'status'         => 'ok',
            'suggestions'    => $result->suggestions(),
            'recommendation' => $result->collation(),
        ));
    }
}
