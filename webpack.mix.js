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
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/toast.js', 'public/js/toast.js')
    .js('resources/js/custom.js', 'public/js/custom.js')
    .vue()
    .js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
    .js('resources/js/bootstrap.bundle.js', 'public/js/bootstrap.bundle.js')
    .sass('resources/sass/app.scss', 'public/css')
