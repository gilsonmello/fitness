<?php

Route::get('errors/under_construction', function(){
	return view('frontend.errors.under_construction');
})->name('errors.under_construction');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['namespace' => 'AdminAuth'], function () {

//Rotas para frontend
Route::group(['namespace' => 'Frontend', 'middleware' => 'redirect'], function(){

	Route::get('/auth', 'UserController@page')->name('frontend.auth');

	require(__DIR__ . "/Frontend/User.php");

	/*Route::get('/', function () {
	    return view('welcome');
	});*/
	Route::get('/', 'FrontendController@index')->name('frontend.index');


	Route::get('/pagseguro/get_session_id', 'PagseguroController@getSessionId')->name('frontend.pagseguro.getSessionId');
	
	Route::get('/pagseguro/get_view', 'PagseguroController@getView')->name('frontend.pagseguro.get_view');


    Route::post('/pagseguro/generate_order', 'PagseguroController@generateOrder')->name('frontend.pagseguro.generate_order');


	Route::post('/payment/pagseguro', 'PaymentController@payment')
		->name('frontend.payment.pagseguro');

	/*Route::get('/services', 'ServicesController@index')->name('services.index');
	Route::get('/services/{slug}', 'ServicesController@view')->name('services.view');*/
});

Route::group(['prefix' => 'painel'], function(){
	Route::get('/', function(){
		return view('layouts.frontend.dashboard.app');
	});
});

Route::get('/admin/error', function(){
	return '<h1>Você não possui permissão</h1>';
});

//Rotas para backend
Route::group(['namespace' => 'Backend'], function () {

	//Rota para login administrativo
	Route::group(['prefix' => 'admin'], function() {
		require(__DIR__ . "/Backend/AdminAuth.php");
	});

	Route::group([
		'prefix' => 'admin',
		'middleware' => 'access.route',
		'role' => ['admin'],
		'permission' => 'backend.view',
		'with' => ['flash_danger', 'You do not have access to do that.'],
		'redirect' => 'admin/error'

		], function(){

			//Rota principal
			Route::get('/', 'DashboardController@index')->name('backend.dashboard');

			//Rotas para as notícias
			require_once __DIR__.'/Backend/News.php';

			//Rotas para as ipacs
			require_once __DIR__.'/Backend/Parq.php';

			//Rotas para os protocolos
			require_once __DIR__.'/Backend/Protocol.php';

			//Rotas para os protocolos
			require_once __DIR__.'/Backend/Evaluation.php';

			//Rotas para os protocolos
			require_once __DIR__.'/Backend/Test.php';

			//Rotas para os protocolos
			require_once __DIR__.'/Backend/AdditionalData.php';

			//Rotas para os relatórios
			require_once __DIR__.'/Backend/Report.php';

			//Rotas para envio de e-mails
			require_once __DIR__.'/Backend/SendEmail.php';
			
			//Rotas para config
			require_once __DIR__.'/Backend/Config.php';

			//Rotas para auth
			require_once __DIR__.'/Backend/Auth.php';

			//Rotas para a agenda
			require_once __DIR__.'/Backend/Diary.php';

			//Rotas para horas da agenda
			require_once __DIR__.'/Backend/DiaryHour.php';

	});
});


/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/home', 'HomeController@index')->name('home');
*/