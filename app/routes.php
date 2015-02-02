<?php


// Home and Static URI's
Route::get('/', 'HomeController@indexPage');
Route::get('/index', 'HomeController@indexPage');
Route::get('about', 'InfoController@AboutPage');

// Events URI from meetup api
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function() {
    Route::resource('events', 'EventsController');
});



/* Profiles URI
 * Controls 
 */

Route::get('user','UserController@fbIdUser');
Route::get('login/fb', 'UserController@fbUserLogedin');


/* Controls user credentials and data from facebook
 * 
 */

Route::get('login/fb/callback', 'UserController@userPage');

//Logout URI
Route::get('logout', 'UserController@fbUserLogout');