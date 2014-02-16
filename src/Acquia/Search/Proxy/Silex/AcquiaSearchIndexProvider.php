<?php

namespace Acquia\Search\Proxy\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;

class AcquiaSearchIndexProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['acquia.search.indexes'] = $app->share(function ($app) {
            return new \Acquia\Common\AcquiaServiceManager(array(
                'conf_dir' => dirname($app['acquia.search.proxy.auth_file'])
            ));
        });

        $app['acquia.search.index'] = $app->share(function ($app) {
            $group = basename($app['acquia.search.proxy.auth_file'], '.json');
            return $app['acquia.search.indexes']->getClient($group, $app['acquia.search.proxy.identifier']);
        });
    }

    public function boot(Application $app)
    {
        // Nothing to do ...
    }
}
