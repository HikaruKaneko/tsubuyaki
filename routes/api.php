<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->prefix('/v1')->namespace('Api\V1')->group(function () {
    Route::get('/posts','PostController@index')->name('posts.index');
    Route::post('/posts','PostController@store')->name('post.create');
    Route::patch('/posts/{post}','PostController@update')->name('posts.update');
    Route::delete('/posts/{post}','PostController@delete')->name('posts.delete');

    Route::get('/users','UserController@index')->name('users.index');
});
