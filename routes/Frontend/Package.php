<?php

Route::resource('packages', 'PackageController', [
    'names' => [
        'index' => 'frontend.packages.index',
        'create' => 'frontend.packages.create',
        'store' => 'frontend.packages.store',
        'edit' => 'frontend.packages.edit',
        'update' => 'frontend.packages.update',
        'destroy' => 'frontend.packages.destroy',
        'show' => 'frontend.packages.show',
    ]
]);