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

mix.ts('resources/js/main.ts', 'public/js')
    .sass('resources/css/main.scss', 'public/css')
    .copyDirectory('resources/assets/img', 'public/assets/img')
    .copyDirectory('resources/assets/fonts', 'public/assets/fonts')
    .minify('public/css/main.css', 'public/css/app.css')
    .minify('public/js/main.js', 'public/js/app.js')
    .browserSync({
        proxy: 'http://pentale.test',
        notify: false
    });
