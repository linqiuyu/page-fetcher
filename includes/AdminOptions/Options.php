<?php

namespace PF\AdminOptions;

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;

class Options {

    const Page_ID = 'page-fetcher';
    const Rules_Key = 'page_fetcher_rules';

    /**
     * 规则配置页面
     */
    public function options_page() {
        add_menu_page(
            __( 'Page Fetcher', 'page-fetcher' ),
            'page fetcher',
            'manage_options',
            'page-fetcher',
            [ $this, 'page_html' ]
        );
    }

    public function page_html() {
        wp_enqueue_script(
            'page-fetch',
            plugin_dir_url( PF_PLUGIN_FILE ) . 'assets/js/app.js',
            [],
            false,
            true
        );

        wp_enqueue_style(
            'page-fetch',
            plugin_dir_url( PF_PLUGIN_FILE ) . 'assets/css/fonts.css'
        );

        echo '<div id="app"><app></app></div>';
    }

    /**
     * 获取规则列表
     *
     * @return array
     */
    public function get_rules() : array {
        return carbon_get_theme_option( Options::Page_ID ) ?: [] ;
    }

}