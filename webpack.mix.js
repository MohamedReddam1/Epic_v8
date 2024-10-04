const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
.postcss('resources/css/app.css', 'public/css', [
require('tailwindcss')
]);