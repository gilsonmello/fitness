<?php

/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/07/2017
 * Time: 11:23
 */

Route::resource('users', 'UserController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'frontend.users.index',
        'create' => 'frontend.users.create',
        'store' => 'frontend.users.store',
        'edit' => 'frontend.users.edit',
        'update' => 'frontend.users.update',
        'destroy' => 'frontend.users.destroy',
    ]
]);
Route::get('users/verify_email', 'UserController@verifyEmail');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('users/logged', 'UserController@logged');
});