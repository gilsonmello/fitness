<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('parqs', 'ParqController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.parqs.index',
        'create' => 'backend.parqs.create',
        'store' => 'backend.parqs.store',
        'edit' => 'backend.parqs.edit',
        'update' => 'backend.parqs.update',
        'destroy' => 'backend.parqs.destroy',
    ]
]);

//Rota para mostrar a tela de respostas do IPAC
Route::get('/parqs/{id}/answer', 'ParqController@answer')->name('backend.parqs.answer');

//Rota para listar as respostas do IPAC
Route::get('/parqs/{id}/parq_answers', 'ParqController@indexIpacAnswers')
    ->name('backend.parqs.parq_answers');

//Rota para cadastar respostas do IPAC
Route::post('/parqs/{id}/create_parq_answers', 'ParqController@createIpacAnswers')
    ->name('backend.parqs.create_parq_answers');

//Rota para atualiazar as respostas do IPAC
Route::put('/parqs/{id}/update_parq_answers', 'ParqController@updateIpacAnswers')
    ->name('backend.parqs.update_parq_answers');