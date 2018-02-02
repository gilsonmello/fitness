<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('categories', 'CategoryController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.categories.index',
        'create' => 'backend.categories.create',
        'store' => 'backend.categories.store',
        'edit' => 'backend.categories.edit',
        'update' => 'backend.categories.update',
        'destroy' => 'backend.categories.destroy',
    ]
]);