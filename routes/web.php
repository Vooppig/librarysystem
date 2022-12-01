<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager_Controller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\member_bookController;

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


//book
Route::get('insertbook', [Manager_Controller::class, 'insert']);
Route::post('insertbook', [Manager_Controller::class, 'do_insert']);
Route::get('listbook', [Manager_Controller::class, 'index']);
Route::get('deletebook/{id}', [Manager_Controller::class, 'delete']);
Route::get('booksearch', [Manager_Controller::class, 'search_forum']);
Route::post('booksearch', [Manager_Controller::class, 'search']);
Route::get('updatebook/{id}', [Manager_Controller::class, 'update_forum']);
Route::post('updatebook', [Manager_Controller::class, 'update']);

//login and register
Route::view('/', 'login');
Route::view('login', 'login');
Route::post('login', [loginController::class, 'login']);
Route::get('logout', [loginController::class, 'logout']);
Route::view('register', 'register');
Route::post('register', [loginController::class, 'register']);

//member.book
Route::get('member_listbook', [member_bookController::class, 'index']);
Route::get('detail/{id}', [member_bookController::class, 'detail']);
Route::get("member_orderdetail/{id}", [member_bookController::class, 'orderdetail']);
Route::get("member_account", [member_bookController::class, 'member_account']);
Route::get('member_orderplace', [member_bookController::class, 'member_orderplace']); 
