<?php

namespace PF\AdminOptions;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AdminOptionsServiceProvider implements ServiceProviderInterface {

    public function register(Container $app) {
        $app['admin_options'] = function () {
            return new Options();
        };
    }

}