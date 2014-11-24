<?php

namespace Acquia\Search\Proxy;

final class AppEvents
{
    /**
     * Event fired during the bootstrap phase.
     *
     * This is used to initialize the application and add additional service
     * providers.
     */
    const BOOTSTRAP = 'acquia.search.proxy.bootstrap';
}
