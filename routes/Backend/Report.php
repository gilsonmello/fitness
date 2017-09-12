<?php
//Rota padrão
Route::resource('reports', 'ReportController', [
    'except' => [
        'show'
    ],
    'names' => [
        'index' => 'backend.reports.index',
        'create' => 'backend.reports.create',
        'store' => 'backend.reports.store',
        'edit' => 'backend.reports.edit',
        'update' => 'backend.reports.update',
        'destroy' => 'backend.reports.destroy',
    ]
]);

Route::get('reports/tests/{id}', 'ReportController@tests')->name('backend.reports.tests');
Route::get('reports/evaluations/{id}', 'ReportController@evaluations')->name('backend.reports.evaluations');