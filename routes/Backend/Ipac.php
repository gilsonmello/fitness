<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

Route::resource('ipacs', 'IpacController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.ipacs.index',
        'create' => 'backend.ipacs.create',
        'store' => 'backend.ipacs.store',
        'edit' => 'backend.ipacs.edit',
        'update' => 'backend.ipacs.update',
        'destroy' => 'backend.ipacs.destroy',
    ]
]);

Route::get('/ipacs/{id}/answer', 'IpacController@answer')->name('backend.ipacs.answer');
Route::post('/ipacs/{id}/ipac_answer', 'IpacController@ipacAnswer')->name('backend.ipacs.ipac_answer');