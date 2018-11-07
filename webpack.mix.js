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

mix.js('resources/assets/js/front/front.js', 'public/js');
mix.sass('resources/assets/sass/front/front.scss', 'public/css');

let options = {};

if (mix.inProduction()) {
    options.postCss = [require('postcss-discard-comments')({ removeAll: true })];
}

mix.options(options);

if (mix.inProduction()) {
    mix.version();
}
