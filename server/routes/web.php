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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//****************************  POST CONTROLLER  ****************************\\
#this is for posting post
Route::post('api/posts/store', 'PostController@store');

#this is for editing post
Route::post('api/posts/edit', 'PostController@edit');

#this is for turning on/off post
Route::get('api/posts/editStatus/{id}', 'PostController@editStatus');

#this is for posting post
Route::get('posts/store', 'PostController@showStore');

#this is for editing post
Route::get('posts/edit/{id}', 'PostController@showEdit');

#this is for show all post
Route::get('posts/show/{status}/{page}', 'PostController@showIndex');

//****************************  FILE CONTROLLER  ****************************\\
Route::get('files/store/{page}', 'FilesController@showStore');

Route::get('/api/files/delete/{id}', 'FilesController@delete');

Route::post('api/files/store', 'FilesController@store');

//****************************  TEST RESULT CONTROLLER  ****************************\\
Route::get('freetest/{page}', 'freeTestController@show');

Route::get('freetest/score/{id}/{score}', 'freeTestController@score');

//****************************  CLIENT MESSAGE CONTROLLER  ****************************\\
Route::get('clients/{page}', 'clientsController@show');

Route::get('clients/resolved/{id}', 'clientsController@resolved');
