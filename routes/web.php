<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','WelcomeController@index');

Route::get('movie/view/{language}/{type}/{id}','WelcomeController@viewMovie');
Route::get('song/view/{type}/{id}','WelcomeController@viewSong');
Route::get('song','WelcomeController@allsongs');
Route::get('songs/{language}','WelcomeController@allSongByLanguage');
Route::get('songs/{language}/{type}','WelcomeController@allSongByType');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  // Dashboard

    Route::get('/dashboard','AdminController@index');


  //Songs Category Management //
    Route::get('/language/add', 'mediaController@addLanguage');
    Route::post('/language/add', 'mediaController@saveLanguage');
    Route::get('/type/add', 'mediaController@addType');
    Route::post('/type/add', 'mediaController@saveType');

    Route::get('/language/manage', 'mediaController@manageLanguage');
    Route::get('/language/edit/{id}', 'mediaController@editLanguage');
    Route::post('/language/update', 'mediaController@updateLanguage');
    Route::get('/language/delete/{id}', 'mediaController@deleteLanguage');

    Route::get('/type/manage', 'mediaController@manageType');
    Route::get('/type/edit/{id}', 'mediaController@editType');
    Route::post('/type/update', 'mediaController@updateType');



  //  Songs Management //
    Route::get('/song/add', 'mediaController@addsong');
    Route::post('/song/save', 'mediaController@saveSong');

    Route::get('/song/manage', 'mediaController@manageSong');
    Route::get('/song/edit/{id}', 'mediaController@editSong');
    Route::post('/song/update', 'mediaController@updateSong');


    //Movie Category Management //
    Route::get('/movie/language/add', 'MovieController@addLanguage');
    Route::post('/movie/language/save', 'MovieController@saveLanguage');
    Route::get('/movie/type/add', 'MovieController@addType');
    Route::post('/movie/type/save', 'MovieController@saveType');

    Route::get('/movie/language/manage', 'MovieController@manageLanguage');
    Route::get('/movie/language/edit/{id}', 'MovieController@editLanguage');
    Route::post('/movie/language/update', 'MovieController@updateLanguage');
    Route::get('/movie/language/delete/{id}', 'MovieController@deleteLanguage');

    Route::get('/movie/type/manage', 'MovieController@manageType');
    Route::get('/movie/type/edit/{id}', 'MovieController@editType');
    Route::post('/movie/type/update', 'MovieController@updateType');
    Route::get('/movie/type/delete/{id}', 'MovieController@deleteType');


    // Movie Actors //

    Route::get('/movie/actor/add', 'MovieController@addActor');
    Route::post('/movie/actor/save', 'MovieController@saveActor');
    Route::get('/movie/actor/manage', 'MovieController@manageActor');
    Route::post('/movie/actor/search','MovieController@searchActor');
    Route::get('/movie/actor/edit/{id}', 'MovieController@editActor');
    Route::post('/movie/actor/update', 'MovieController@updateActor');
    Route::get('/movie/actor/delete/{id}', 'MovieController@deleteActor');

    //  Movie Management //
    Route::get('/movie/add', 'MovieController@addMovie');
    Route::post('/movie/save', 'MovieController@saveMovie');

    Route::get('/movie/manage', 'MovieController@manageMovie');
    Route::get('/movie/edit/{id}', 'MovieController@editMovie');
    Route::post('/movie/addActor', 'MovieController@addMovieActor');
    Route::get('/movie/deleteActor/{actorId}/{movieId}', 'MovieController@deleteMovieActor');
    Route::post('/movie/update', 'MovieController@updateMovie');


});

Route::group(['prefix' => 'user'], function () {
    Route::get('/dashboard', 'UserController@index');
  Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UserAuth\LoginController@login');
  Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UserAuth\RegisterController@register');

  Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');

  //Songs //


    Route::get('song/view/{type}/{id}','UserController@viewSong');
    Route::get('song','UserController@allsongs');
    Route::get('songs/{language}','UserController@allSongByLanguage');
    Route::get('songs/{language}/{type}','UserController@allSongByType');


    //Movies //

    Route::get('/movie/{language}','UserController@moviesByLanguage');
    Route::post('/movie/searchByLanguage','UserController@searchByLanguage');
    Route::get('movie/view/{type}/{id}','UserController@viewMovie');
});
