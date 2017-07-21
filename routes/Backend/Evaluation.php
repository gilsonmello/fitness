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