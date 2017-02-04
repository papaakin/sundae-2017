const { mix } = require('laravel-mix');

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
mix.copy('resources/assets/fonts', 'public/fonts')
   .copy('resources/assets/images', 'public/images')
   .js(['resources/assets/js/app.js',
   		'resources/assets/js/sidebar-toggler.js'], 
   		'public/js/global.js')
   .sass('resources/assets/sass/app.scss', 'public/css/')
   .combine(['public/css/app.css', 'resources/assets/css/jeban-iconset-embedded.css', 'resources/assets/css/global.css'], 'public/css/global.css');
