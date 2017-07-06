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

//Rotas para frontend
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/', 'FrontendController@index')->name('frontend.index');
	Route::get('/services', 'ServicesController@index')->name('services.index');
	Route::get('/services/{slug}', 'ServicesController@view')->name('services.view');
});

//Rotas para backend
Route::group(['namespace' => 'Backend'], function () {

	

	Route::group(['prefix' => 'admin'], function() {
		require(__DIR__ . "/Backend/AdminAuth.php");
	});


	Route::group([
		'prefix' => 'admin', 
		'middleware' => 'access.route', 
		'role' => 'adm',
		'permission' => 'view_backend',
		'with' => 'Você não tem acesso'
	], function(){
		
			Route::get('/', function(){
				return redirect()->route('auth.login');
			});
				
			Route::get('/dashboard', 'HomeController@index')->name('home');
			

			//Rota principal
			/*Route::get('/', function () {
				return view('welcome');
			});*/

			//Auth::routes(['middleware' => 'auth.admin']);

			//Rota para login administrativo

			//Rotas para as notícias
			require_once __DIR__.'/Backend/News.php';

	});
});
/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/home', 'HomeController@index')->name('home');
*/