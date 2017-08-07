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

Route::post('tests/protocols/{id}/save_maximum_heart_rate', 'TestController@saveMaximumHeartRate')
    ->name('backend.tests.save_maximum_heart_rate');

Route::delete('tests/{test_id}/protocols/{id}/destroy_maximum_heart_rate', 'TestController@destroyMaximumHeartRate')
    ->name('backend.tests.destroy_maximum_heart_rate');

Route::get('tests/protocols/{id}/find_protocol', 'TestController@findProtocol')
    ->name('backend.tests.find_protocol');

Route::post('tests/protocols/{id}/save_minimum_heart_rate', 'TestController@saveMinimumHeartRate')
    ->name('backend.tests.save_minimum_heart_rate');

Route::delete('tests/{test_id}/protocols/{id}/destroy_minimum_heart_rate', 'TestController@destroyMinimumHeartRate')
    ->name('backend.tests.destroy_minimum_heart_rate');

Route::post('tests/protocols/{id}/save_reserve_heart_rate', 'TestController@saveReserveHeartRate')
    ->name('backend.tests.save_reserve_heart_rate');

Route::delete('tests/{test_id}/protocols/{id}/destroy_reserve_heart_rate', 'TestController@destroyReserveHeartRate')
    ->name('backend.tests.destroy_reserve_heart_rate');

Route::post('tests/protocols/{id}/save_maximum_vo2', 'TestController@saveMaximumVo2')
    ->name('backend.tests.save_maximum_vo2');

Route::delete('tests/{test_id}/protocols/{id}/destroy_maximum_vo2', 'TestController@destroyMaximumVo2')
    ->name('backend.tests.destroy_maximum_vo2');

Route::post('tests/protocols/{id}/save_training_vo2', 'TestController@saveTrainingVo2')
    ->name('backend.tests.save_training_vo2');

Route::delete('tests/{test_id}/protocols/{id}/destroy_training_vo2', 'TestController@destroyTrainingVo2')
    ->name('backend.tests.destroy_training_vo2');





