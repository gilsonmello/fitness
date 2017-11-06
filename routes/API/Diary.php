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
        'index' => 'api.diaries.index',
        'create' => 'api.diaries.create',
        'store' => 'api.diaries.store',
        'edit' => 'api.diaries.edit',
        'update' => 'api.diaries.update',
        'destroy' => 'api.diaries.destroy',
    ]
]);