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
    //.css('resources/css/app.css', 'public/css')
    //.copyDirectory('wp-content/themes/portfolio/resources/fonts', 'wp-content/themes/portfolio/public/fonts')
    .browserSync({
        proxy: 'http://pentale.test',
        notify: false
    });
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
