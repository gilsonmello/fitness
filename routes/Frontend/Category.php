<?php

Route::resource('categories', 'CategorieController', [
    'names' => [
        'index' => 'frontend.categories.index',
        'create' => 'frontend.categories.create',
        'store' => 'frontend.categories.store',
        'edit' => 'frontend.categories.edit',
        'update' => 'frontend.categories.update',
        'destroy' => 'frontend.categories.destroy',
        'show' => 'frontend.categories.show',
    ]
]);