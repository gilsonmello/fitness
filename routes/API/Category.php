<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('categories', 'Categoryontroller', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'api.categories.index',
        'create' => 'api.categories.create',
        'store' => 'api.categories.store',
        'edit' => 'api.categories.edit',
        'update' => 'api.categories.update',
        'destroy' => 'api.categories.destroy',
    ]
]);