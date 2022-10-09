<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;

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
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/sign-up', 'index')->name('register')->middleware('guest');
        // Route::post('/auth/register', 'store')->name('register');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart');
        // Route::post('/auth/register', 'store')->name('register');
    });
});
