<?php
// Route::group(['namespace' => 'AdminAuth'], function () {
Route::get('/questions', 'QuestionController@index')->name('backend.questions');
Route::get('/questions/{id}/view', 'QuestionController@index')->name('backend.questions.view');
Route::get('/questions/create', 'QuestionController@create')->name('backend.questions.create');
Route::post('/questions/store', 'QuestionController@store')->name('backend.questions.store');