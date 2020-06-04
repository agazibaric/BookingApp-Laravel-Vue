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

Route::get('/', 'BookController@index');

Auth::routes();

Route::get('/home', 'BookController@index')->name('home');

// Book
Route::resource('book', 'BookController');
Route::get('/mybooks', 'BookController@mybooks')->name('mybooks');
Route::get('/bookedBooks', 'BookController@bookedBooks')->name('bookedBooks');
Route::get('/bookABook/{bookId}', 'BookController@bookABook')->name('bookABook');
Route::get('/returnABook/{bookId}', 'BookController@returnABook')->name('returnABook');
Route::get('/available', 'BookController@available')->name('available');

// User
Route::get('/usersettings', 'UserController@edit')->name('usersettings');
Route::post('/updateUser', 'UserController@update')->name('updateUser');
Route::get('/editPassword', 'UserController@editPassword')->name('editPassword');
Route::post('/updatePassword', 'UserController@updatePassword')->name('updatePassword');
