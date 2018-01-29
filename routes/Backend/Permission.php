<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('permissions', 'PermissionController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.permissions.index',
        'create' => 'backend.permissions.create',
        'store' => 'backend.permissions.store',
        'edit' => 'backend.permissions.edit',
        'update' => 'backend.permissions.update',
        'destroy' => 'backend.permissions.destroy',
    ]
]);