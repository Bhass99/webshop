const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
    mix.less('resources/sass/less/components/sidebar.less', 'public/css')
        .less('resources/sass/less/components/login.less', 'public/css')
        .less('resources/sass/less/components/header_footer.less', 'public/css')
        .less('resources/sass/less/components/shoppingcart.less', 'public/css')
        .less('resources/sass/less/components/register.less', 'public/css')
        .less('resources/sass/less/parent.less', 'public/css');


