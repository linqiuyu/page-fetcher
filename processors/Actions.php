<?php

namespace PF\Processors;

use Carbon_Fields\Carbon_Fields;
use PF\Application;
use PF\ProcessorInterface;

/**
 * Class Actions
 *
 * @package PF\Processors
 */
class Actions implements ProcessorInterface{

    private Application $app;

    public function process( $app ) {
        $this->app = $app;
        $this->actions();
        if ( is_admin() ) {
            $this->admin_actions();
        }
        add_action( 'template_redirect', [$this, 'template_actions'] );
    }

    public function actions() {
        add_action( 'after_setup_theme', [ Carbon_Fields::class, 'boot' ] );
        add_action( 'carbon_fields_register_fields', [ $this->app['admin_options'], 'options' ] );
    }

    public function admin_actions() {

    }

    public function template_actions() {

    }

}