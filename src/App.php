<?php

namespace Acquia\Search\Proxy;

class App
{
    /**
     * @return \Silex\Application
     */
    static public function bootstrap(array $config = array())
    {
        $config += array('root_dir'  => __DIR__ . '/..');
        $config += array('conf_file' => $config['root_dir'] . '/conf/config.yml');

        $app = new \Silex\Application;

        // Registers the configuration service provider so that developers can
        // configure the app through a config file.
        $app->register(new \Igorw\Silex\ConfigServiceProvider($config['conf_file'], array(
            'root_dir' => $config['root_dir'],
        )));

        // Optionally add the monolog service provider if the "monolog.logfile"
        // configuration option is set.
        if (isset($app['monolog.logfile'])) {
            $app->register(new \Silex\Provider\MonologServiceProvider());
        }

        // Register the index and service manager as a service so we can query
        // our Acquia Search indexes.
        $app->register(new \Acquia\Search\Proxy\Silex\AcquiaSearchIndexProvider());

        // Dispatch the "acquia.search.proxy.bootstrap" event so that developers
        // can hook into the bootstrap process and add their providers.
        $event = new Event\AppEvent($app);
        $app['dispatcher']->dispatch(AppEvents::BOOTSTRAP, $event);

        return $app;
    }
}
