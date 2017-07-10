<?php

	// Route::group(['namespace' => 'AdminAuth'], function () {
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.login');

	Route::post('/login', 'Auth\LoginController@login');

	Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');

	Route::get('/logout', 'Auth\LoginController@getLogout')->name('auth.getLogout');

	Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.email');

	Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

	Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.request');

	Route::get('/password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('auth.password.reset');

	Route::post('/password/register', 'Auth\RegisterController@register');

	Route::get('/password/register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');

	// Route::group(['middleware' => 'guest'], function () {
	// 	get('auth/login/{provider}', ['as' => 'auth.provider', 'uses' => 'AdminAuthController@loginThirdParty']);
	// 	get('account/confirm/{token}', ['as' => 'account.confirm', 'uses' => 'AdminAuthController@confirmAccount']);
	// 	get('account/confirm/resend/{user_id}', ['as' => 'account.confirm.resend', 'uses' => 'AdminAuthController@resendConfirmationEmail']);

	// 	Route::controller('auth', 'AdminAuthController');
	// 	Route::controller('password', 'PasswordController');
	// });
// });