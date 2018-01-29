<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('roles', 'RoleController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.roles.index',
        'create' => 'backend.roles.create',
        'store' => 'backend.roles.store',
        'edit' => 'backend.roles.edit',
        'update' => 'backend.roles.update',
        'destroy' => 'backend.roles.destroy',
    ]
]);