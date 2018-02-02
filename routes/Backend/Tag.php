<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('tags', 'TagController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.tags.index',
        'create' => 'backend.tags.create',
        'store' => 'backend.tags.store',
        'edit' => 'backend.tags.edit',
        'update' => 'backend.tags.update',
        'destroy' => 'backend.tags.destroy',
    ]
]);