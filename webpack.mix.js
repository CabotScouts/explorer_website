const mix = require('laravel-mix');
mix.sass('resources/sass/app.scss', 'public/css').styles('node_modules/@fortawesome/fontawesome-free/css/all.css', 'public/css/icons.css');
