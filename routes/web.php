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
//questions
Route::get('/forum', 'QuestionController@index')->name('forum');
Route::post('/question', 'QuestionController@store');
Route::delete('/question/{question}', 'QuestionController@destroy');

Route::get('/editquestion/{question}', 'QuestionController@edit');
Route::patch('/question/{question}', 'QuestionController@update');
//answers
Route::post('/answer', 'AnswerController@store');
Route::delete('/answer/{answer}', 'AnswerController@destroy');


