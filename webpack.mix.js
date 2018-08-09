let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.setResourceRoot('../');

mix.js('src/js/ninja_wp_gdpr.js', 'public/js/ninja_wp_gdpr.js')
    .js('src/js/wp_gdpr_user_display.js', 'public/js/wp_gdpr_user_display.js')
    .sass('src/css/style.scss', 'public/css/styles.css');
