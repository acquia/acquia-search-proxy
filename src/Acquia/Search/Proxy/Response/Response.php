<?php

namespace Acquia\Search\Proxy\Response;

use Silex\Application;

class Response
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
     * @param \Silex\Application $app
     *
     * @return \Acquia\Search\Proxy\Response\Response
     */
    public static function factory(Application $app)
    {
        return static::__construct($app);
    }

    /**
     * @return \Silex\Application
     */
    public function getApplication()
    {
        return $this->app;
    }
}
