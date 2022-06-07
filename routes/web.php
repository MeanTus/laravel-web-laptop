<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
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

// ================== Route userpage ==========================

Route::group([
    'as' => 'userpage.'
], function () {
    // Route home page
    Route::get('/', [UserController::class, 'index'])->name('index');

    // Route Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');

    // Route Log out
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Register
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('process_register');
});

Route::group([
    'middleware' => CheckLoginMiddleware::class,
    'as' => 'userpage.'
], function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/profile/{user_id}', [UserController::class, 'show'])->name('profile');
});

// ==================================================================

// ======================== Route Admin =============================
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/login', [AuthController::class, 'loginAdmin'])->name('login');
    Route::post('/login', [AuthController::class, 'processLoginAdmin'])->name('processLogin');
    Route::get('/logout', [AuthController::class, 'logoutAdmin'])->name('logout');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => CheckAdminMiddleware::class
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Route Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add-product', [ProductController::class, 'create'])->name('add-product');
    Route::post('/add-product', [ProductController::class, 'store'])->name('store-product');

    // Route Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');

    // Route Brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('/add-brand', [BrandController::class, 'create'])->name('add-brand');
    Route::post('/store-brand', [BrandController::class, 'store'])->name('store-brand');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit-brand');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('update-brand');

    // Route Order
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/add-order', [OrderController::class, 'create'])->name('add-order');
});
