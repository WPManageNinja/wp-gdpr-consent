let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.setResourceRoot('../');

mix.sass('src/css/style.scss', 'public/css/styles.css');

mix.js('src/js/ninja_wp_gdpr.js', 'public/js/ninja_wp_gdpr.js');
// mix.js('src/js/UserShowApp.js', 'public/js/UserShowApp.js');