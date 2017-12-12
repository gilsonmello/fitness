<?php

Route::resource('suppliers', 'SupplierController', [
    'names' => [
        'index' => 'frontend.suppliers.index',
        'create' => 'frontend.suppliers.create',
        'store' => 'frontend.suppliers.store',
        'edit' => 'frontend.suppliers.edit',
        'update' => 'frontend.suppliers.update',
        'destroy' => 'frontend.suppliers.destroy',
        'show' => 'frontend.suppliers.show',
    ]
]);