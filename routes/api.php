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
	    'except' => [
	        'show'
	    ],
	    'names' => [
	        'index' => 'api.users.index',
	        'create' => 'api.users.create',
	        'store' => 'api.users.store',
	        'edit' => 'api.users.edit',
	        'update' => 'api.users.update',
	        'destroy' => 'api.users.destroy',
	    ]
	]);
	Route::get('users', 'UserController@all');

});

