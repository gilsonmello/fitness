<?php
Route::get('/question_group', 'QuestionGroupController@index')->name('backend.question_group.index');
Route::get('/question_group/{id}/view', 'QuestionGroupController@index')->name('backend.question_group.view');
Route::get('/question_group/{id}/edit', 'QuestionGroupController@index')->name('backend.question_group.edit');
Route::get('/question_group/{id}/update', 'QuestionGroupController@index')->name('backend.question_group.update');
Route::get('/question_group/create', 'QuestionGroupController@create')->name('backend.question_group.create');
Route::post('/question_group/store', 'QuestionGroupController@store')->name('backend.question_group.store');