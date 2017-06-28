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
		Route::get('/', function () {
		    return view('welcome');
		});
		Route::get('/home', 'HomeController@index')->name('home');
	});
});

/*Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
*/