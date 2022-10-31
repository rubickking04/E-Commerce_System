<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ProductViewerController;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\LogoutController as AdminLogout;
use App\Http\Controllers\Store\LoginController as StoreLogin;
use App\Http\Controllers\Store\HomeController as StoreHome;
use App\Http\Controllers\Store\ProductController as StoreProduct;
use App\Http\Controllers\Store\ProductsTableController as ProductsTable;
use App\Http\Controllers\Store\LogoutController as StoreLogout;
use App\Http\Controllers\User\StoreController;

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
    /**
     * Routes for the Farmers.
     */
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login')->middleware('guest');
        Route::post('/login', 'store')->name('login');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/sign-up', 'index')->name('sign-up')->middleware('guest');
        Route::post('/register', 'store')->name('register');
    });
    Route::controller(ShopController::class)->group(function () {
        Route::get('/shop', 'index')->name('shop');
    });
    Route::controller(ProductViewerController::class)->group(function () {
        // Route::get('/product', 'index')->name('product');
        Route::get('/product/{products:id}', 'show')->name('show.product');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(CartController::class)->group(function () {
            Route::get('/cart', 'index')->name('cart');
            // Route::post('/auth/register', 'store')->name('register');
        });
        Route::controller(StoreController::class)->group(function () {
            Route::get('/store', 'index')->name('store');
            Route::post('/my-store', 'store')->name('my-store');
        });
        Route::controller(LogoutController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
        });
    });

    /**
     * Routes for Administrator and AdminLogin
     */
    Route::controller(AdminLogin::class)->group(function () {
        Route::get('/admin/login', 'index')->name('admin.login')->middleware('guest:admin');
        Route::post('/admin/login', 'store')->name('admin.login');
    });
    Route::middleware('auth:admin')->group(function () {
        /**
         * Routes to Dashboard of the Administrators Account.
         */
        Route::controller(AdminHome::class)->group(function () {
            Route::get('/admin/home', 'index')->name('admin.home');
        });
        Route::controller(AdminLogout::class)->group(function () {
            Route::post('/admin/logout', 'logout')->name('admin.logout');
        });
    });
    Route::controller(StoreLogin::class)->group(function () {
        Route::get('/my-store/login', 'index')->name('store.login')->middleware('guest:store');
        Route::post('/my-store/signin', 'store')->name('my-store.login');
    });
    Route::middleware('auth:store')->group(function () {
        Route::controller(StoreHome::class)->group(function () {
            Route::get('/my-store/home', 'index')->name('store.home');
        });
        Route::controller(StoreProduct::class)->group(function () {
            Route::get('/my-store/product', 'index')->name('store.products');
            Route::post('/my-store/add_products', 'store')->name('add_products');
        });
        Route::controller(ProductsTable::class)->group(function () {
            Route::get('/my-store/products_table', 'index')->name('store.products.table');
            // Route::post('/my-store/add_products', 'store')->name('add_products');
        });
        Route::controller(StoreLogout::class)->group(function () {
            Route::post('/store/logout', 'logout')->name('store.logout');
        });
    });
});
