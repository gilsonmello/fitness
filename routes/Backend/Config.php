<?php 
//Rota padrão
Route::resource('config', 'ConfigController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.config.index',
        'create' => 'backend.config.create',
        'store' => 'backend.config.store',
        'edit' => 'backend.config.edit',
        'update' => 'backend.config.update',
        'destroy' => 'backend.config.destroy',
    ]
]);
