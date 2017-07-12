<?php
Route::get('/question_group', 'QuestionGroupController@index')->name('backend.question_group.index');
Route::get('/question_group/{id}/view', 'QuestionGroupController@view')->name('backend.question_group.view');
Route::get('/question_group/{id}/edit', 'QuestionGroupController@edit')->name('backend.question_group.edit');
Route::put('/question_group/{id}/update', 'QuestionGroupController@update')->name('backend.question_group.update');
Route::get('/question_group/create', 'QuestionGroupController@create')->name('backend.question_group.create');
Route::post('/question_group/store', 'QuestionGroupController@store')->name('backend.question_group.store');
Route::delete('/question_group/{id}/destroy', 'QuestionGroupController@destroy')->name('backend.question_group.destroy');