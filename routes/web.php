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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('boards', 'BoardsController');
Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
Route::resource('likes', 'LikesController', ['only' => ['store', 'destroy']]);
Route::resource('users', 'UserController', ['only' => ['edit', 'update', 'show']]);

// ログインURL
Route::get('auth/twitter', 'Auth\TwitterController@redirectToProvider')->name('twitter.login');;
// コールバックURL
Route::get('auth/twitter/callback', 'Auth\TwitterController@handleProviderCallback')->name('twitter.callback');;
//マップ表示URL
Route::resource('maps', 'MapController', ['only' => ['index']]);