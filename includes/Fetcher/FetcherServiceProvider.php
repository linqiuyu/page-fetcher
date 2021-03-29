<?php

namespace PF\Fetcher;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class FetcherServiceProvider
 * @package PF\Fetcher
 */
class FetcherServiceProvider implements ServiceProviderInterface {

    public function register(Container $app) {
        $app['fetcher'] = function () {
            return new Fetcher();
        };
    }

}