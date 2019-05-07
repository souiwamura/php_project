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

Route::group(['middleware' => 'web'], function () {

    /*
     * 認証がらみ(ログイン、ログアウト、PWリセット)
     */
    Route::auth();
    
    /*
     * バック処理(リダイレクト対象)
     */
    Route::post('/comments/store', 'CommentsController@store')->name('commentsStore');
    Route::post('/posts/store', 'PostsController@store')->name('postsStore');
    Route::post('/posts/update', 'PostsController@update')->name('postsUpdate');
    Route::post('/posts/destroy', 'PostsController@destroy')->name('postsDestroy');
    Route::post('/delete', 'Auth\DeleteController@delete')->name('delete');

    /*
     * 画面遷移(view対象)
     */
    // homeコントローラは使用しないためここで画面遷移させる
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/top', 'PostsController@top')->name('top');
    Route::get('/getTotal', 'TotalController@getTotal')->name('getTotal');

    Route::resource('/posts', 'PostsController', ['only' => ['create','show','edit']]);
});
