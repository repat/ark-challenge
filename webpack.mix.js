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

// Laravel Defaults
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

// FontAwesome
mix.js('node_modules/@fortawesome/fontawesome-free/js/all.min.js', 'public/js/fontawesome.js');
mix.styles('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css/fontawesome.css');

// include-fragment-element
// mix.js('node_modules/@github/include-fragment-element/dist/index.js', 'public/js/include-fragment.js');
// mix.styles('node_modules/@github/include-fragment-element/dist/index.css', 'public/css/include-fragment.css');

