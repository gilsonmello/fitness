<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('diaries', 'DiaryController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.diaries.index',
        'create' => 'backend.diaries.create',
        'store' => 'backend.diaries.store',
        'edit' => 'backend.diaries.edit',
        'update' => 'backend.diaries.update',
        'destroy' => 'backend.diaries.destroy',
    ]
]);