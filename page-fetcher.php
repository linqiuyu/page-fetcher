<?php
/**
 * Plugin Name: Page Fetcher
 * Plugin URI: https://github.com/linqiuyu/page-fetcher
 * Description: 页面采集工具
 * Version: 1.0.0
 * Requires PHP: 7.4
 * Author: linqiuyu
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: page-fetcher
 * Domain Path: languages
 */

namespace PF;

if ( ! defined( 'PF_PLUGIN_FILE' ) ) {
    define( 'PF_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'PF_PLUGIN_DIR' ) ) {
    define( 'PF_PLUGIN_DIR', plugin_dir_path( PF_PLUGIN_FILE ) );
}

require_once PF_PLUGIN_DIR . 'vendor/autoload.php';

function app() {
    static $app;
    if ( is_null( $app ) ) {
        $app = new Application();
        $app->bootstrap();
    }

    return $app;
}

app();