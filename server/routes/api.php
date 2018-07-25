<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#this is for take regular post
Route::get('posts/show/{type}', 'PostController@index');

#this is for posting post
Route::get('posts/store', 'PostController@showStore');
Route::post('posts/store', 'PostController@store')->name("createPost");

#this is for take three most important post
Route::get('posts/three', 'PostController@showThree');
