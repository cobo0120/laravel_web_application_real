const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .js( 'resources/js/destination.js','public/js' )
   .autoload( 
    {"jquery": [ '$', 'window.jQuery' ],
})
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

