<?php

Route::resource('profiles', 'ProfileController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'painel.profiles.index',
        'create' => 'painel.profiles.create',
        'store' => 'painel.profiles.store',
        'edit' => 'painel.profiles.edit',
        'update' => 'painel.profiles.update',
        'destroy' => 'painel.profiles.destroy',
    ]
]);