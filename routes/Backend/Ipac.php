<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
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

//Rota para mostrar a tela de respostas do IPAC
Route::get('/ipacs/{id}/answer', 'IpacController@answer')->name('backend.ipacs.answer');

//Rota para listar as respostas do IPAC
Route::get('/ipacs/{id}/ipac_answers', 'IpacController@indexIpacAnswers')
    ->name('backend.ipacs.ipac_answers');

//Rota para cadastar respostas do IPAC
Route::post('/ipacs/{id}/create_ipac_answers', 'IpacController@createIpacAnswers')
    ->name('backend.ipacs.create_ipac_answers');

//Rota para atualiazar as respostas do IPAC
Route::put('/ipacs/{id}/update_ipac_answers', 'IpacController@updateIpacAnswers')
    ->name('backend.ipacs.update_ipac_answers');