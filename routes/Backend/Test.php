<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 29/07/2017
 * Time: 15:35
 */

//Rota padrão
Route::resource('tests', 'TestController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.tests.index',
        'create' => 'backend.tests.create',
        'store' => 'backend.tests.store',
        'edit' => 'backend.tests.edit',
        'update' => 'backend.tests.update',
        'destroy' => 'backend.tests.destroy',
    ]
]);

Route::post('tests/{id}/update_frequencia_cardiaca', 'TestController@updateFrequenciaCardiaca')
->name('backend.tests.update_frequencia_cardiaca');

Route::post('tests/protocols/{id}/save_frequencia_cardiaca_maxima', 'TestController@saveFrequenciaCardiacaMaxima')
    ->name('backend.tests.save_frequencia_cardiaca_maxima');

Route::get('tests/protocols/{id}/find_protocol', 'TestController@findProtocol')
    ->name('backend.tests.find_protocol');