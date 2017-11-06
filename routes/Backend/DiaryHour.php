<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('diary_hours', 'DiaryHourController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.diary_hours.index',
        'create' => 'backend.diary_hours.create',
        'store' => 'backend.diary_hours.store',
        'edit' => 'backend.diary_hours.edit',
        'update' => 'backend.diary_hours.update',
        'destroy' => 'backend.diary_hours.destroy',
    ]
]);