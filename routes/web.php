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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('book', 'BookController');
Route::get('/mybooks', 'BookController@mybooks')->name('mybooks');
Route::get('/bookedBooks', 'BookController@bookedBooks')->name('bookedBooks');
Route::get('/bookABook/{bookId}', 'BookController@bookABook')->name('bookABook');
Route::get('/available', 'BookController@available')->name('available');
Route::get('/usersettings', 'UserController@edit')->name('usersettings');
Route::get('/updateUser', 'UserController@update')->name('updateUser');
Route::get('/changePassword', 'UserController@changePassword')->name('changePassword');
