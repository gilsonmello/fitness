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

Route::get('tests/{test_id}/protocols/{id}/find_protocol', 'TestController@findProtocol')
    ->name('backend.tests.find_protocol');

Route::get('tests/{test_id}/protocols/{id}/find_protocol_maximum_vo2', 'TestController@findProtocolVo2Maximum')
    ->name('backend.tests.find_protocol_maximum_vo2');

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

Route::post('tests/{test_id}/save_resistance/{type_resistance}', 'TestController@saveResistance')
    ->name('backend.tests.save_resistance');

Route::delete('tests/{test_id}/protocols/{id}/destroy_resistance', 'TestController@destroyResistance')
    ->name('backend.tests.destroy_resistance');

Route::post('tests/protocols/{id}/save_target_zone', 'TestController@saveTargetZone')
    ->name('backend.tests.save_target_zone');

Route::delete('tests/{test_id}/protocols/{id}/destroy_target_zone', 'TestController@destroyTargetZone')
    ->name('backend.tests.destroy_target_zone');

Route::post('tests/{id}/save_flexitests', 'TestController@saveFlexitests')
    ->name('backend.tests.save_flexitests');

Route::post('tests/{id}/save_wells_bank', 'TestController@saveWellsBank')
    ->name('backend.tests.save_wells_bank');

Route::get('tests/{id}/additional_data', 'TestController@additionalData')
    ->name('backend.tests.additional_data');

Route::get('tests/additional_data_maximum_heart_rate', 'TestController@additionalDataMaximumHeartRate')
    ->name('backend.tests.additional_data_maximum_heart_rate');

Route::get('tests/additional_data_minimum_heart_rate', 'TestController@additionalDataMinimumHeartRate')
    ->name('backend.tests.additional_data_minimum_heart_rate');

Route::get('tests/additional_data_reserve_heart_rate', 'TestController@additionalDataReserveHeartRate')
    ->name('backend.tests.additional_data_reserve_heart_rate');

Route::get('tests/additional_data_maximum_vo2', 'TestController@additionalDataMaximumVo2')
    ->name('backend.tests.additional_data_maximum_vo2');

Route::get('tests/additional_data_training_vo2', 'TestController@additionalDataTrainingVo2')
    ->name('backend.tests.additional_data_training_vo2');

Route::get('tests/additional_data_resistance', 'TestController@additionalDataResistance')
    ->name('backend.tests.additional_data_resistance');

Route::get('tests/additional_data_target_zone', 'TestController@additionalDataTargetZone')
    ->name('backend.tests.additional_data_target_zone');

Route::get('tests/additional_data_flexibility', 'TestController@additionalDataFlexibility')
    ->name('backend.tests.additional_data_flexibility');

Route::post('tests/save_attribute', 'TestController@saveAttribute')
    ->name('backend.tests.save_attribute');

Route::post('tests/{user_id}/save_additional_data', 'TestController@saveAdditionalData')
    ->name('backend.tests.save_additional_data');

Route::get('tests/{test_id}/resistance/{type_resistance}', 'TestController@getResistances')
    ->name('backend.tests.get_resistances');






