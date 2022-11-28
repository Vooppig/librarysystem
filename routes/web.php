<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Manager_Controller;
use App\Http\Controllers\loginController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    Mail::to('se20d011@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});
Route::get('mail',function(){
    return new WelcomeMail();
});
Route::get('/', [ImageController::class, 'index']);

Route::get('/form', [ImageController::class, 'form']);

Route::post('/upload', [ImageController::class, 'upload']);


//book
Route::get('insertbook', [Manager_Controller::class, 'insert']);
Route::post('insertbook', [Manager_Controller::class, 'do_insert']);
Route::get('listbook', [Manager_Controller::class, 'index']);
Route::get('deletebook/{id}', [Manager_Controller::class, 'delete']);
Route::get('booksearch', [Manager_Controller::class, 'search_forum']);
Route::post('booksearch', [Manager_Controller::class, 'search']);
Route::get('updatebook/{id}', [Manager_Controller::class, 'update_forum']);
Route::post('updatebook', [Manager_Controller::class, 'update']);
Route::view('register', 'register');
Route::post('register', [loginController::class, 'register']);
Route::view('login', 'login');
Route::post('login', [loginController::class, 'login']);
