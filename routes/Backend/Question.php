<?php
// Route::group(['namespace' => 'AdminAuth'], function () {
Route::get('/questions', 'QuestionController@index')->name('backend.questions.index');
Route::get('/questions/{id}/view', 'QuestionController@index')->name('backend.questions.view');
Route::get('/questions/{id}/edit', 'QuestionController@edit')->name('backend.questions.edit');
Route::put('/questions/{id}/update', 'QuestionController@update')->name('backend.questions.update');
Route::get('/questions/create', 'QuestionController@create')->name('backend.questions.create');
Route::post('/questions/store', 'QuestionController@store')->name('backend.questions.store');
Route::delete('/questions/{id}/destroy', 'QuestionController@destroy')->name('backend.questions.destroy');