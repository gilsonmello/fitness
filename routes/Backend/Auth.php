<?php
//Rota padrão
Route::resource('auth', 'Auth\AuthController', [
	'except' => [
		'show'
	],
	'names' => [
		'index' => 'backend.auth.index',
		'create' => 'backend.auth.create',
		'store' => 'backend.auth.store',
		'edit' => 'backend.auth.edit',
		'update' => 'backend.auth.update',
		'destroy' => 'backend.auth.destroy',
	]
]);