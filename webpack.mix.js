const mix = require('laravel-mix');


/**************
 * JavaScript *
 **************/

mix.js('resources/js/app.js', 'public/js');



/*******
 * CSS *
 *******/


// Global
mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/parent/style.scss', 'public/css/parent')
    .sass('resources/sass/auth.scss', 'public/css');


// Nanny
mix.sass('resources/sass/nanny/profile.scss', 'public/css/nanny');
