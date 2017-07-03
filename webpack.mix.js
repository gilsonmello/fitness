const { mix } = require('laravel-mix');

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

//mix.minify('resources/assets/css/backend/AdminLTE.css');

//mix.minify('resources/assets/css/backend/bootstrap/css/bootstrap.css');

mix.styles([
    'resources/assets/bootstrap/css/bootstrap.css'
], 'public/css/backend/bootstrap.css');

mix.styles([
    'resources/assets/dist/css/AdminLTE.css',
    'resources/assets/dist/css/skins/_all-skins.min.css',
    'resources/assets/plugins/iCheck/flat/blue.css',
    'resources/assets/plugins/morris/morris.css',
    'resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    'resources/assets/plugins/datepicker/datepicker3.css',
    'resources/assets/plugins/plugins/daterangepicker/daterangepicker.css',
    'resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
], 'public/css/backend/app.css');

mix.scripts([
    'resources/assets/plugins/jQuery/jquery-2.2.3.min.js'
], 'public/js/backend/jquery.js');

mix.scripts([
    'resources/assets/bootstrap/js/bootstrap.min.js'
], 'public/js/backend/bootstrap.js');

mix.scripts([
    'resources/assets/plugins/morris/morris.min.js',
    'resources/assets/plugins/sparkline/jquery.sparkline.min.js',
    'resources/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
    'resources/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    'resources/assets/plugins/knob/jquery.knob.js',
    'resources/assets/plugins/daterangepicker/daterangepicker.js',
    'resources/assets/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'resources/assets/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/assets/plugins/fastclick/fastclick.js',
    'resources/assets/dist/js/app.min.js',
    'resources/assets/dist/js/pages/dashboard.js',
    'resources/assets/dist/js/demo.js',
], 'public/js/backend/app.js');

//Styles para tela de login administrativo
mix.styles([
    'resources/assets/dist/css/AdminLTE.css',
    'resources/assets/plugins/iCheck/square/blue.css',
], 'public/css/backend/login.css');

//Scripts para tela de login administrativo
mix.scripts([
    'resources/assets/plugins/iCheck/icheck.min.js'
], 'public/js/backend/login.js');


/*mix.combine([
    'resources/assets/js/backend/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/js/backend/plugins/jQueryUI/jquery-ui.js',
], 'public/js/backend/backend.js');*/

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/

mix.version();