<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 20/07/2017
 * Time: 19:27
 */
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('evaluations', 'EvaluationController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.evaluations.index',
        'create' => 'backend.evaluations.create',
        'store' => 'backend.evaluations.store',
        'edit' => 'backend.evaluations.edit',
        'update' => 'backend.evaluations.update',
        'destroy' => 'backend.evaluations.destroy',
    ]
]);

Route::post('evaluations/{id}/update_weight_and_height', 'EvaluationController@updateWeightAndHeight')->name('backend.evaluations.update_weight_and_height');
Route::post('evaluations/{id}/update_antropometria', 'EvaluationController@updateAntropometria')->name('backend.evaluations.update_antropometria');
//Rota para atualiazar as respostas do IPAC
Route::post('/evaluations/{id}/update_parq', 'EvaluationController@updateParq')
    ->name('backend.evaluations.update_parq');
Route::post('evaluations/{id}/update_bioempedancia', 'EvaluationController@updateBioempedancia')->name('backend.evaluations.update_bioempedancia');
Route::post('evaluations/{id}/update_pregras_cutaneas', 'EvaluationController@updatePregrasCutaneas')->name('backend.evaluations.update_pregras_cutaneas');
Route::post('evaluations/{id}/update_analise_postural_anterior', 'EvaluationController@updateAnalisePosturalAnterior')->name('backend.evaluations.update_analise_postural_anterior');
Route::post('evaluations/{id}/send_img_analise_postural_anterior', 'EvaluationController@sendImgAnalisePosturalAnterior')->name('backend.evaluations.send_img_analise_postural_anterior');





