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

mix
    .js('resources/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js')
    .js('resources/js/custom.js', 'public/js/custom.js')
    .js('resources/js/jquery-1.11.0.min.js', 'public/js/jquery-1.11.0.min.js')
    .js('resources/js/slick.min.js', 'public/js/slick.min.js')
    .js('resources/js/templatemo.js', 'public/js/templatemo.js')
    .js('resources/js/templatemo.min.js', 'public/js/templatemo.min.js')
    .js('resources/js/bootstrap4-toggle.min.js', 'public/js/bootstrap4-toggle.min.js')

    .postCss('resources/css/templatemo.css', 'public/css/templatemo.css')
    .postCss('resources/css/fontawesome.css', 'public/css/fontawesome.css')
    .postCss('resources/css/fontawesome.min.css', 'public/css/fontawesome.min.css')
    .sass('resources/css/app.scss', 'public/css/app.css')
