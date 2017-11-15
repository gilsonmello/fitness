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

mix.scripts([
    'resources/assets/js/payment.js',
], 'public/js/payment.js');

mix.styles([
    'public/bower_components/admin-lte/plugins/select2/select2.min.css',
    'public/bower_components/external-plugins/jquery-validate/jquery.validate.css',
    'public/bower_components/external-plugins/sweetalert-master/dist/sweetalert.css',
], 'public/css/payment.css');

mix.scripts([
    'public/bower_components/external-plugins/toastr/toastr.js',
    'public/bower_components/admin-lte/plugins/moment/moment.min.js',
    'public/bower_components/admin-lte/plugins/select2/select2.full.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.numeric.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.phone.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.regex.extensions.js',
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
    'public/bower_components/external-plugins/jquery-validate/jquery.validate.min.js',

   

    'resources/assets/js/helpers.js',
], 'public/js/plugins.js');

mix.styles([
    'public/bower_components/external-plugins/ionicons/ionicons.min.css',
    'public/bower_components/admin-lte/bootstrap/css/font-awesome.min.css',
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
    'public/bower_components/admin-lte/dist/css/skins/_all-skins.min.css',
    'public/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    'public/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css',
    'public/bower_components/external-plugins/sweetalert-master/dist/sweetalert.css',
    'public/bower_components/external-plugins/jquery-validate/jquery.validate.css',
    'public/bower_components/external-plugins/toastr/toastr.css',

    /*
        CSS do tema Gentella
    
    'node_modules/gentelella/vendors/iCheck/skins/flat/green.css',
    'node_modules/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
    'node_modules/gentelella/css/maps/jquery-jvectormap-2.0.3.css',
    'node_modules/gentelella/build/css/custom.min.css',*/
], 'public/css/plugins.css');



mix.js([
    'resources/assets/js/app.js'
], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app.css');

/*mix.js([
    'resources/assets/js/painel.js'
], 'public/js/painel.js');*/

mix.scripts([

    /*
        JS do tema Gentella
    */
    'public/bower_components/gentelella/vendors/fastclick/lib/fastclick.js',
    'public/bower_components/gentelella/vendors/nprogress/nprogress.js',
    'public/bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js',
    'public/bower_components/gentelella/vendors/bernii/gauge.js/dist/gauge.min.js',
    'public/bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'public/bower_components/gentelella/vendors/skycons/skycons.js',
    'public/bower_components/gentelella/vendors/Flot/jquery.flot.js',
    'public/bower_components/gentelella/vendors/Flot/jquery.flot.pie.js',
    'public/bower_components/gentelella/vendors/Flot/jquery.flot.time.js',
    'public/bower_components/gentelella/vendors/Flot/jquery.flot.stack.js',
    'public/bower_components/gentelella/vendors/Flot/jquery.flot.resize.js',
    'public/bower_components/gentelella/production/js/flot/jquery.flot.orderBars.js',
    'public/bower_components/gentelella/production/js/flot/date.js',
    'public/bower_components/gentelella/production/js/flot/jquery.flot.spline.js',
    'public/bower_components/gentelella/production/js/flot/curvedLines.js',
    'public/bower_components/gentelella/production/js/maps/jquery-jvectormap-2.0.3.min.js',
    'public/bower_components/gentelella/production/js/moment/moment.min.js',
    'public/bower_components/gentelella/production/js/datepicker/daterangepicker.js',
    'public/bower_components/gentelella/production/js/maps/jquery-jvectormap-world-mill-en.js',
    'public/bower_components/gentelella/production/js/maps/jquery-jvectormap-us-aea-en.js',
    'public/bower_components/gentelella/production/js/maps/gdp-data.js',


    'public/bower_components/gentelella/build/js/custom.js',
], 'public/js/gentelella.js');

mix.styles([

    /*
        CSS do tema Gentella
    */
    'public/bower_components/gentelella/vendors/iCheck/skins/flat/green.css',
    'public/bower_components/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
    'public/bower_components/gentelella/production/css/maps/jquery-jvectormap-2.0.3.css',
    'public/bower_components/gentelella/build/css/custom.min.css',
], 'public/css/painel.css');

/* Fim Scripts para o painel */



mix.styles([
    'public/bower_components/admin-lte/bootstrap/css/bootstrap.css'
], 'public/backend/css/bootstrap.css');

mix.styles([
    'public/bower_components/external-plugins/toastr/toastr.css',
    'public/bower_components/external-plugins/ionicons/ionicons.min.css',
    'public/bower_components/admin-lte/bootstrap/css/font-awesome.min.css',
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
    'public/bower_components/external-plugins/jquery-validate/jquery.validate.css',

], 'public/backend/css/app.css');

mix.scripts([
    'public/bower_components/admin-lte/plugins/jQuery/jquery-2.2.3.min.js'
], 'public/backend/js/jquery.js');

mix.scripts([
    'public/bower_components/admin-lte/bootstrap/js/bootstrap.min.js'
], 'public/backend/js/bootstrap.js');

mix.scripts([
    'public/bower_components/external-plugins/toastr/toastr.js',
    'public/bower_components/admin-lte/plugins/moment/moment.min.js',
    'public/bower_components/admin-lte/plugins/select2/select2.full.js',

    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.numeric.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.phone.extensions.js',
    'public/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.regex.extensions.js',

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
    'public/bower_components/external-plugins/jquery-validate/jquery.validate.min.js',
    'public/bower_components/admin-lte/dist/js/app.js',
    'public/bower_components/admin-lte/dist/js/demo.js',

    'resources/assets/backend/js/helpers.js',
], 'public/backend/js/app.js');

mix.scripts([
    'resources/assets/backend/js/auth/auth.js',
    'resources/assets/backend/js/tests/frequency-heart/frequency-heart.js',
    'resources/assets/backend/js/tests/vo2/vo2.js',
    'resources/assets/backend/js/tests/resistance/resistance.js',
    'resources/assets/backend/js/tests/target-zone/target-zone.js',
    'resources/assets/backend/js/tests/flexibility/flexibility.js',
    'resources/assets/backend/js/tests/additional_data/additional-data.js',
], 'public/backend/js/main.js');

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

//mix.version();