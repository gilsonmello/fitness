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
	Route::get('/', function () {
	    return view('welcome');
	});
});

//Rotas para backend
Route::group(['namespace' => 'Backend'], function () {
	Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

		//Rota principal
		Route::get('/', function () {
			return view('welcome');
		});
		//Rota para login administrativo
		Route::get('/login', ['uses' => 'Auth\LoginController@showLoginForm'])->name('login');
		//Rotas para as notícias
		require_once __DIR__.'/Backend/News.php';

		Route::get('/home', 'HomeController@index')->name('home');
	});
});
Auth::routes();
/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/home', 'HomeController@index')->name('home');
*/