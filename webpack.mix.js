let mix = require('laravel-mix');

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

mix.js('resources/assets/js/custom.js', 'public/js/custom.js')
    .js('resources/assets/js/all.js', 'public/js/all.js')
    .js('resources/assets/js/form.js', 'public/js/form.js')
    .js('resources/assets/js/cv-ar.js', 'public/js/cv-ar.js')
    .sass('resources/assets/sass/custom.scss', 'public/css/custom.css')
    .sass('resources/assets/sass/company.scss', 'public/css/company.css')
    .sass('resources/assets/sass/form.scss', 'public/css/form.css')
    .sass('resources/assets/sass/new_mini.scss', 'public/css/new_mini.css')
    .sass('resources/assets/sass/admin.scss', 'public/css/admin.css');

mix.copy('resources/assets/sass/img/', 'public/css/images/').version('public/css/images');
mix.options({ processCssUrls: false });