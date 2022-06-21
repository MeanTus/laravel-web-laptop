<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GPUController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
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

    // Shop page
    Route::get('/shop', [UserPageController::class, 'shopPage'])->name('shop');

    // Detail Product
    Route::get('/detail/{product}', [UserPageController::class, 'showDetailProduct'])->name('detail');

    // Search
    Route::get('/search', [SearchController::class, 'searchByName'])->name('search');
});

Route::group([
    'middleware' => CheckLoginMiddleware::class,
    'as' => 'userpage.'
], function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile');
    Route::post('/update-user/{user}', [UserController::class, 'update'])->name('update_user');
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
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    // Route Product
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add-product', [ProductController::class, 'create'])->name('add-product');
    Route::post('/add-product', [ProductController::class, 'store'])->name('store-product');
    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit-product');
    Route::put('/update-product/{product}', [ProductController::class, 'update'])->name('update-product');

    // Route RAM
    Route::get('/ram', [RamController::class, 'index'])->name('ram');
    Route::get('/add-ram', [RamController::class, 'create'])->name('add-ram');
    Route::post('/add-ram', [RamController::class, 'store'])->name('store-ram');
    Route::get('/edit-ram/{ram}', [RamController::class, 'edit'])->name('edit-ram');
    Route::post('/update-ram/{ram}', [RamController::class, 'update'])->name('update-ram');

    // Route CPU
    Route::get('/cpu', [CPUController::class, 'index'])->name('cpu');
    Route::get('/add-cpu', [CPUController::class, 'create'])->name('add-cpu');
    Route::post('/add-cpu', [CPUController::class, 'store'])->name('store-cpu');
    Route::get('/edit-cpu/{cpu}', [CPUController::class, 'edit'])->name('edit-cpu');
    Route::post('/update-cpu/{cpu}', [CPUController::class, 'update'])->name('update-cpu');

    // Route GPU
    Route::get('/gpu', [GPUController::class, 'index'])->name('gpu');
    Route::get('/add-gpu', [GPUController::class, 'create'])->name('add-gpu');
    Route::post('/add-gpu', [GPUController::class, 'store'])->name('store-gpu');
    Route::get('/edit-gpu/{gpu}', [GPUController::class, 'edit'])->name('edit-gpu');
    Route::post('/update-gpu/{gpu}', [GPUController::class, 'update'])->name('update-gpu');

    // Route Color
    Route::get('/color', [ColorController::class, 'index'])->name('color');
    Route::get('/add-color', [ColorController::class, 'create'])->name('add-color');
    Route::post('/add-color', [ColorController::class, 'store'])->name('store-color');
    Route::get('/edit-color/{color}', [ColorController::class, 'edit'])->name('edit-color');
    Route::post('/update-color/{color}', [ColorController::class, 'update'])->name('update-color');

    // Route Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/add-category', [CategoryController::class, 'store'])->name('store-category');
    Route::get('/edit-category/{category}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::post('/update-category/{category}', [CategoryController::class, 'update'])->name('update-category');

    // Route Brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('/add-brand', [BrandController::class, 'create'])->name('add-brand');
    Route::post('/store-brand', [BrandController::class, 'store'])->name('store-brand');
    Route::get('/edit-brand/{brand}', [BrandController::class, 'edit'])->name('edit-brand');
    Route::post('/update-brand/{brand}', [BrandController::class, 'update'])->name('update-brand');
    Route::get('/delete-brand/{brand}', [BrandController::class, 'destroy'])->name('delete-brand');

    // Route Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/add-supplier', [SupplierController::class, 'create'])->name('add-supplier');
    Route::post('/store-supplier', [SupplierController::class, 'store'])->name('store-supplier');
    Route::get('/edit-supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit-supplier');
    Route::put('/update-supplier/{supplier}', [SupplierController::class, 'update'])->name('update-supplier');
    Route::get('/delete-supplier/{supplier}', [SupplierController::class, 'destroy'])->name('delete-supplier');

    // Route Order
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/add-order', [OrderController::class, 'create'])->name('add-order');

    // Route Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/add-customer', [CustomerController::class, 'create'])->name('add-customer');

    // Route Admin
    Route::get('/list-admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/add-admin', [AdminController::class, 'create'])->name('add-admin');
});
