<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 01/07/2017
 * Time: 11:23
 */

Route::group(['prefix' => 'news'], function ()
{
    /* News Management */
    Route::get('/', 'NewsController@index')->name('news.index');

    Route::get('{id}/edit', 'NewsController@edit')->name('news.index');
});