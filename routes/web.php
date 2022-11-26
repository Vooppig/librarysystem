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
//book
Route::get('bookhome', function () {
    return view('Manager.book.home');
});
Route::get('insertbook', 'App\Http\Controllers\bookController@insert');
Route::post('insertbook', 'App\Http\Controllers\bookController@do_insert');
Route::get('listbook', 'App\Http\Controllers\bookController@index');
Route::get('deletebook/{id}', 'App\Http\Controllers\bookController@delete');
Route::get('booksearch', 'App\Http\Controllers\bookController@search_forum');
Route::post('booksearch', 'App\Http\Controllers\bookController@search');
