let mix = require('laravel-mix');

require('laravel-mix-criticalcss');
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

mix.js([
    'resources/assets/js/app.js'
], 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .criticalCss({
        enabled: mix.inProduction(),
        paths: {
            base: 'https://disk.devel.by/',
            templates: './public/css/'
        },
        urls: [
            { url: '/', template: 'home' },
            { url: 'uslugi.html', template: 'uslugi' },
            { url: 'pokraska.html', template: 'uslugi_detail' },
            { url: 'price.html', template: 'price' },
            { url: 'galmenu.html', template: 'galmenu' },
        ],
        options: {
            minify: true,
        },
    })
    .browserSync('http://diskremont.local/');

mix.js('resources/assets/js/admin.js', 'public/js');

mix.js('resources/assets/js/libs/canvg.js', 'public/js');


