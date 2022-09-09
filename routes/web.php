<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


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
Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');
Route::get('/auth/logout', [MainController::class, 'logout'])->name('auth.logout');
Route::post('/auth/check', [MainController::class, 'check'])->name('auth.check');
Route::post('/crud/bookform/save', [MainController::class, 'book'])->name('crud.bookform.save');

Route::group(['middleware' => ['AutCheck']], function () {
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');   
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.login');
    Route::get('/navbar', [MainController::class, 'homepage'])->name('navbar');
   
    Route::get('/homepage', [MainController::class, 'userbookings'])->name('homepage');
    // Route::resource('/crud/bookform','BookingController');
});
