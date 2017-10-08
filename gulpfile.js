 var mix  = require('laravel-mix');


/*
 mix.css([
     'resources/assets/css/backend/bootstrap/css/bootstrap.css',
     'resources/assets/css/backend/AdminLTE.css'
 ],'public/css/backend/backend.css');*/

 mix.js([
      'resources/assets/js/backend/plugins/jQuery/jquery-2.2.3.min.js',
      'resources/assets/js/backend/plugins/jQueryUI/jquery-ui.js',
 ], 'public/js/backend/backend.js');
