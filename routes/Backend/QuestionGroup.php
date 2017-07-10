<?php
// Route::group(['namespace' => 'AdminAuth'], function () {
Route::get('/question_group', 'QuestionGroupController@index')->name('backend.question_group');
Route::get('/question_group/{id}/view', 'QuestionGroupController@index')->name('backend.question_group.view');