const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'assets/js')
    .postCss('resources/css/app.css', 'assets/css', [
        //
    ])
    .copy('node_modules/element-ui/lib/theme-chalk/fonts/element-icons.woff', 'assets/fonts/element-icons.woff')
    .copy('node_modules/element-ui/lib/theme-chalk/fonts/element-icons.ttf', 'assets/fonts/element-icons.ttf');
