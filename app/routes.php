<?php


Route::get('/', 'HomeController@indexPage');
Route::get('about', 'InfoController@AboutPage');

Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function() {

    Route::resource('user','UserController');
    Route::resource('events', 'EventsController');

});