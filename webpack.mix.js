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

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/scss/app.scss', 'public/css');

mix.js('resources/js/editor.js', 'public/js');

mix.js('resources/js/datatables.js', 'public/js');
mix.css('./node_modules/simple-datatables/src/style.css', 'public/css/datatables.css');

mix.js('resources/js/datepicker.js', 'public/js');
mix.css('./node_modules/vanillajs-datepicker/dist/css/datepicker-bs5.min.css', 'public/css/datepicker.css');

mix.js("resources/js/admin.js", "public/js")
  .sass("resources/scss/admin.scss", "public/css");


// mix.browserSync({
//     proxy: 'laravel-blade-set.test',
// });

mix.version();
