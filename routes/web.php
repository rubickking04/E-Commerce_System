<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserInfoController;
use App\Http\Controllers\User\ProductInfoController;
use App\Http\Controllers\User\StoreViewerController;
use App\Http\Controllers\User\ProductViewerController;
use App\Http\Controllers\User\AddProductToCartController;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Store\HomeController as StoreHome;
use App\Http\Controllers\Admin\LoginController as AdminLogin;
use App\Http\Controllers\Store\LoginController as StoreLogin;
use App\Http\Controllers\User\SearchProductOrStoreController;
use App\Http\Controllers\Admin\LogoutController as AdminLogout;
use App\Http\Controllers\Store\LogoutController as StoreLogout;
use App\Http\Controllers\Store\ProductController as StoreProduct;
use App\Http\Controllers\Store\OrdersTableController as OrdersTable;
use App\Http\Controllers\Store\ProductsTableController as ProductsTable;
use App\Http\Controllers\Admin\OrdersTableController as OrdersTableController;
use App\Http\Controllers\Admin\StoresTableController as StoresTableController;
use App\Http\Controllers\Admin\FarmersTableController as FarmersTableController;
use App\Http\Controllers\Admin\ProductsTableController as ProductsTableController;

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
Route::get('/home', function () {
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
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{users:username}', 'index')->name('profile');
    });
    Route::controller(ProductViewerController::class)->group(function () {
        Route::get('/product/{products:id}', 'show')->name('show.product');
    });
    Route::controller(StoreViewerController::class)->group(function () {
        Route::get('/store/view/{stores:id}', 'index')->name('storeviewer');
    });
    Route::controller(SearchProductOrStoreController::class)->group(function () {
        Route::get('/search', 'search')->name('search_product_or_store_controller');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(CartController::class)->group(function () {
            Route::get('/cart', 'index')->name('cart');
            Route::get('/cart/check-out/{id}', 'destroy')->name('cart.checkout');
            Route::get('/cart/check-out-all', 'destroyAll')->name('cart.checkout-all');
            // Route::post('/auth/register', 'store')->name('register');
        });
        Routex ::controller(OrderController::class)->group(function () {
            Route::get('/my-orders', 'index')->name('order');
            Route::post('/orders', 'store')->name('order.store');
        });
        Route::controller(AddProductToCartController::class)->group(function () {
            Route::post('/add-to-cart/{products:id}', 'store')->name('add.cart');
            // Route::post('/auth/register', 'store')->name('register');
        });
        Route::controller(StoreController::class)->group(function () {
            Route::get('/store', 'index')->name('store');
            Route::post('/my-store', 'store')->name('my-store');
        });
        Route::controller(ProductInfoController::class)->group(function () {
            Route::get('/my-orders/{orders:id}', 'index')->name('prod.info');
            // Route::post('/my-store', 'store')->name('my-store');
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
        Route::controller(FarmersTableController::class)->group(function () {
            Route::get('/admin/farmers_table', 'index')->name('admin.farmers');
            Route::get('/admin/farmers/search', 'search')->name('admin.farmers.search');
            Route::post('/admin/farmers/update/{id}', 'update')->name('admin.farmers.update');
            Route::get('/admin/farmers/destroy/{id}', 'destroy')->name('admin.farmers.delete');
        });
        Route::controller(StoresTableController::class)->group(function () {
            Route::get('/admin/stores_table', 'index')->name('admin.stores');
            Route::get('/admin/stores/search', 'search')->name('admin.farmers.search');
            Route::post('/admin/stores/update/{id}', 'update')->name('admin.stores.update');
            Route::get('/admin/stores/destroy/{id}', 'destroy')->name('admin.farmers.delete');
        });
        Route::controller(ProductsTableController::class)->group(function () {
            Route::get('/admin/products_table', 'index')->name('admin.products');
            Route::get('/admin/products/search', 'search')->name('admin.products.search');
            // Route::post('/admin/stores/update/{id}', 'update')->name('admin.stores.update');
            Route::get('/admin/products/destroy/{id}', 'destroy')->name('admin.products.delete');
        });
        Route::controller(OrdersTableController::class)->group(function () {
            Route::get('/admin/orders_table', 'index')->name('admin.orders');
            Route::get('/admin/orders/search', 'search')->name('admin.orders.search');
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
            Route::get('/search/products', 'search')->name('search.product');
            Route::post('/update/products/{id}', 'update')->name('update.product');
            Route::get('/destroy/products/{id}', 'destroy')->name('delete.product');
        });
        Route::controller(OrdersTable::class)->group(function () {
            Route::get('/my-store/orders', 'index')->name('store.orders');
            Route::get('/search/orders', 'search')->name('search.order');
        });
        Route::controller(StoreLogout::class)->group(function () {
            Route::post('/store/logout', 'logout')->name('store.logout');
        });
    });
});
