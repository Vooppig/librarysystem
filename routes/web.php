<?php

use App\Http\Controllers\cashier_controller;
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
Route::get("member_orderbuydetail/{id}", [member_bookController::class, 'orderbuydetail']);;
Route::get('search', [member_bookController::class, 'search']);
Route::post('orderplace', [member_bookController::class, 'place_order']);
Route::get('member_myorders', [member_bookController::class, 'myOrders']);
Route::get('member_account', [member_bookController::class, 'account']);
Route::get("ext_req/{id}", [member_bookController::class, "ext_req"]);
Route::get('member_req', [member_bookController::class,"member_req"]);

//cashier.book
Route::get('cashier_listbook', [cashier_controller::class, 'index']);
Route::get('cashier_allorders',[cashier_controller::class, 'allOrders']);
Route::get('cashier_request', [cashier_controller::class, 'request']);
Route::get('cashier_ext', [cashier_controller::class, 'ext']);