const mix  = require('laravel-mix');

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
    'public/bower_components/admin-lte/bootstrap/css/bootstrap.min.css',
], 'public/backend/css/bootstrap.css');

mix.styles([
    'public/bower_components/admin-lte/bootstrap/css/font-awesome.min.css',
    'public/bower_components/admin-lte/dist/css/AdminLTE.min.css',
    'public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css',
    'public/bower_components/admin-lte/plugins/datepicker/datepicker3.css',
    'public/bower_components/admin-lte/plugins/iCheck/minimal/_all.css',
    'public/bower_components/admin-lte/plugins/iCheck/square/_all.css',
    'public/bower_components/admin-lte/plugins/iCheck/flat/_all.css',
    'public/bower_components/admin-lte/plugins/iCheck/line/_all.css',
    'public/bower_components/admin-lte/plugins/iCheck/polaris/polaris.css',
    'public/bower_components/admin-lte/plugins/iCheck/futurico/futurico.css',
    'public/bower_components/admin-lte/plugins/iCheck/all.css',
    'public/bower_components/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.css',
    'public/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.css',
    'public/bower_components/admin-lte/plugins/select2/select2.min.css',
    'public/bower_components/admin-lte/dist/css/AdminLTE.min.css',
    'public/bower_components/admin-lte/dist/css/skins/_all-skins.min.css',
    'public/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    'public/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css',
    'public/bower_components/external-plugins/sweetalert-master/dist/sweetalert.css',

], 'public/backend/css/app.css');

mix.scripts([
    'public/bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js'
], 'public/backend/js/jquery.js');

mix.scripts([
    'public/bower_components/admin-lte/bootstrap/js/bootstrap.min.js'
], 'public/backend/js/bootstrap.js');

mix.scripts([

    'public/bower_components/admin-lte/plugins/moment/moment.min.js',
    'public/bower_components/admin-lte/plugins/select2/select2.full.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js',

    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js',
    'public/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js',
    'public/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js',
    'public/bower_components/admin-lte/plugins/colorpicker/bootstrap-colorpicker.min.js',
    'public/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.js',
    'public/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.js',
    'public/bower_components/admin-lte/plugins/iCheck/icheck.min.js',
    'public/bower_components/admin-lte/plugins/fastclick/fastclick.js',
    'public/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    'public/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js',
    'public/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js',
    'public/bower_components/external-plugins/sweetalert-master/dist/sweetalert.min.js',
    'public/bower_components/admin-lte/dist/js/app.js',
    'public/bower_components/admin-lte/dist/js/demo.js',




    'resources/assets/backend/js/helpers.js',
], 'public/backend/js/app.js');

/*
//Styles para tela de login administrativo
mix.styles([
    'resources/assets/dist/css/AdminLTE.css',
    'resources/assets/plugins/iCheck/square/blue.css',
], 'public/css/backend/login.css');

//Scripts para tela de login administrativo
mix.scripts([
    'resources/assets/plugins/iCheck/icheck.min.js'
], 'public/js/backend/login.js');
 */

/*mix.combine([
    'resources/assets/js/backend/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/assets/js/backend/plugins/jQueryUI/jquery-ui.js',
], 'public/js/backend/backend.js');*/

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/

mix.version();