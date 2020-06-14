<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/success', function(){
    return view('success');
});

Route::get('/about', function(){
    return view('about');
});

Auth::routes();

Route::get('/index/{user}', 'HomeController@index')->name('message.show');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store')->name('message.store');
Route::get('/m/{message_id}', 'MessageController@index');
Route::get('/download', 'MessageController@download');
Route::get('/test', 'MessageController@test');


