<?php

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
Route::group(['namespace' => 'Frontend'], function(){
	
	/*Route::get('/', function () {
	    return view('welcome');
	});*/
	Route::get('/', 'FrontendController@index')->name('frontend.index');
	/*Route::get('/services', 'ServicesController@index')->name('services.index');
	Route::get('/services/{slug}', 'ServicesController@view')->name('services.view');*/
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
		'redirect' => 'admin/login'

		], function(){

			//Rota principal
			Route::get('/', 'DashboardController@index')->name('backend.dashboard');

			//Rotas para questions
			require(__DIR__ . "/Backend/Question.php");

			//Rotas para question_group
			require(__DIR__ . "/Backend/QuestionGroup.php");

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
				
	});
});

Route::group(['prefix' => 'api', 'namespace' => 'API'], function(){


	Route::group(['prefix' => 'users'], function(){
		Route::get('/', 'UserController@all')->name('api.users.index');
		Route::get('/{id}', function($id){
			return 'Usuário '. $id;
		});
		Route::get('/find/{id}', function($id){
			return 'Buscando usuário '. $id;
		});
	});
});
/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/home', 'HomeController@index')->name('home');
*/