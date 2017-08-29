<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('additional_data', 'AdditionalDataController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.additional_data.index',
        'create' => 'backend.additional_data.create',
        'store' => 'backend.additional_data.store',
        'edit' => 'backend.additional_data.edit',
        'update' => 'backend.additional_data.update',
        'destroy' => 'backend.additional_data.destroy',
    ]
]);