<?php

namespace PF\AdminOptions;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Options {

    public function options() {
        Container::make( 'theme_options', __( 'Page Fetcher', 'page-fetcher' ) )
            ->add_fields( [
                Field::make( 'text', 'text', 'Text' ),
            ] );
    }

}