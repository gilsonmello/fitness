<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api', 'namespace' => 'API'], function(){
    Route::get('user', function(Request $request){
    	return $request->user();
    });

});

Route::get('test', function(Request $request){
    return response($request->all(), 200);
});


Route::group(['namespace' => 'API'], function(){
    
	Route::resource('users', 'UserController', [
	    'names' => [
	        'index' => 'api.users.index',
	        'create' => 'api.users.create',
	        'store' => 'api.users.store',
	        'edit' => 'api.users.edit',
	        'update' => 'api.users.update',
	        'destroy' => 'api.users.destroy',
	        'show' => 'api.users.show',
	    ]
	]);

	Route::resource('schedules', 'ScheduleController', [
	    'names' => [
	        'index' => 'api.schedules.index',
	        'create' => 'api.schedules.create',
	        'store' => 'api.schedules.store',
	        'edit' => 'api.schedules.edit',
	        'update' => 'api.schedules.update',
	        'destroy' => 'api.schedules.destroy',
	        'show' => 'api.schedules.show',
	    ]
	]);

	//Route::get('users', 'UserController@all');
	Route::post('create_user', 'UserController@createUser');

	Route::resource('packages', 'PackageController', [
	    'names' => [
	        'index' => 'api.packages.index',
	        'create' => 'api.packages.create',
	        'store' => 'api.packages.store',
	        'edit' => 'api.packages.edit',
	        'update' => 'api.packages.update',
	        'destroy' => 'api.packages.destroy',
	        'show' => 'api.packages.show',
	    ]
	]);

	//Rotas para as diários
	require_once __DIR__.'/API/Diary.php';

});

