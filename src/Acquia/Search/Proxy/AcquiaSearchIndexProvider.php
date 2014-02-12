<?php

namespace Acquia\Search\Proxy;

use Acquia\Common\AcquiaServiceManager;
use Silex\Application;
use Silex\ServiceProviderInterface;

class AcquiaSearchIndexProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['acquia.search'] = $app->share(function ($app) {
            $services = new AcquiaServiceManager(array(
                'conf_dir' => $app['acquia.search.conf_dir']
            ));
            return $services->getClient('search', $app['acquia.search.identifier']);
        });
    }

    public function boot(Application $app)
    {

    }
}
