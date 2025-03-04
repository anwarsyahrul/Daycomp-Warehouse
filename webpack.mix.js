const mix = require('laravel-mix');

mix.js('resources/js/coreui.bundle.min.js', 'public/js')
   .css('resources/css/coreui.min.css', 'public/css')
   .version(); // Cache busting
