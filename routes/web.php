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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//posts
Route::post('/post', 'PostController@store');
Route::delete('/post/{post}', 'PostController@destroy');

Route::get('/edit/{post}', 'PostController@edit');
Route::patch('/post/{post}', 'PostController@update');

//thread
Route::resource('/thread','ThreadController');
Route::get('/thread', 'ThreadController@index')->name('thread');
Route::post('/thread', 'ThreadController@store');
Route::get('/threadsingle/{thread_id}', 'ThreadController@show')->name('single');

//comment
Route::resource('comment','CommentController');
Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');
Route::get('/editcomment/{comment}', 'CommentController@edit');
Route::patch('/comment/{comment}', 'CommentController@update');
Route::delete('/comment/{comment}', 'CommentController@destroy');
//reply
Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');

Route::auth();

