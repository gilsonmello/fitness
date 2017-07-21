<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 12/07/2017
 * Time: 18:18
 */

//Rota padrão
Route::resource('protocols', 'ProtocolController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.protocols.index',
        'create' => 'backend.protocols.create',
        'store' => 'backend.protocols.store',
        'edit' => 'backend.protocols.edit',
        'update' => 'backend.protocols.update',
        'destroy' => 'backend.protocols.destroy',
    ]
]);