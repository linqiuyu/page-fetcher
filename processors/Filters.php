<?php

namespace PF\Processors;

use PF\Application;
use PF\ProcessorInterface;

class Filters implements ProcessorInterface {

    private Application $app;

    public function process( $app ) {
        $this->filters();
        if ( is_admin() ) {
            $this->admin_filters();
        }
        add_action( 'template_redirect', [$this, 'template_filters'] );
    }

    public function filters() {

    }

    public function admin_filters() {

    }

    public function template_filters() {

    }

}