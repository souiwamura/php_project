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

Route::post('/comments/store', 'CommentsController@store')->name('commentsStore');
Route::post('/posts/store', 'PostsController@store')->name('postsStore');
Route::post('/posts/update', 'PostsController@update')->name('postsUpdate');

Route::group(['middleware' => 'web'], function () {

    // 認証がらみ(ログイン、ログアウト、PWリセット)
    Route::auth();
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/top', 'PostsController@top')->name('top');
    Route::resource('/posts', 'PostsController', ['only' => ['create','show','edit']]);

});
