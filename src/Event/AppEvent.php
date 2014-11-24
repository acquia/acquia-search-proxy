<?php

namespace Acquia\Search\Proxy\Event;

use Silex\Application;
use Symfony\Component\EventDispatcher\Event;

class AppEvent extends Event
{
    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * @param \Silex\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return \Silex\Application
     */
    public function getApp()
    {
        return $this->app;
    }
}
