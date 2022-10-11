<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ProductViewerController;

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
    return redirect()->route('shop');
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login', 'store')->name('login');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/sign-up', 'index')->name('sign-up')->middleware('guest');
        Route::post('/register', 'store')->name('register');
    });
    Route::controller(ShopController::class)->group(function () {
        Route::get('/e-mart', 'index')->name('shop');
    });
    Route::controller(ProductViewerController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
    });



    Route::middleware('auth')->group(function () {
        Route::controller(CartController::class)->group(function () {
            Route::get('/cart', 'index')->name('cart');
            // Route::post('/auth/register', 'store')->name('register');
        });
        Route::controller(LogoutController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
        });
    });
});
