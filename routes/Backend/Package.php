<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('packages', 'PackageController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.packages.index',
        'create' => 'backend.packages.create',
        'store' => 'backend.packages.store',
        'edit' => 'backend.packages.edit',
        'update' => 'backend.packages.update',
        'destroy' => 'backend.packages.destroy',
    ]
]);