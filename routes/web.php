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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top', 'PostsController@top')->name('top');

Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show']]); 
Route::resource('comments', 'CommentsController', ['only' => ['store']]);

// 認証がらみ
Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index')->name('home');
});
