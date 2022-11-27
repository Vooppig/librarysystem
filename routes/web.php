<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\bookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now   create something great!
|
*/


Route::get('/', [ImageController::class, 'index']);

Route::get('/form', [ImageController::class, 'form']);

Route::post('/upload', [ImageController::class, 'upload']);


//book
Route::get('bookhome', function () {
    return view('Manager.book.home');
});
Route::get('insertbook', [bookController::class, 'insert']);
Route::post('insertbook', [bookController::class, 'do_insert']);
Route::get('listbook', [bookController::class, 'index']);
Route::get('deletebook/{id}', [bookController::class, 'delete']);
Route::get('booksearch', [bookController::class, 'search_forum']);
Route::post('booksearch', [bookController::class, 'search']);
Route::get('updatebook/{id}', [bookController::class, 'update_forum']);
Route::post('updatebook', [bookController::class, 'update']);
Route::view('register','register');
Route::post('register', 'App\Http\Controllers\bookController@register');
Route::view('login','login');
Route::post('login', 'App\Http\Controllers\bookController@login');
