<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CPUController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GPUController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RamController;
use App\Http\Controllers\ResetPassController;
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
    Route::get('/', [UserPageController::class, 'indexHomePage'])->name('index');
    Route::get('/contact-us', [UserPageController::class, 'contactUs'])->name('contact-us');

    // Route Login
    Route::get('/login-register', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');

    //Login facebook
    Route::get('/login-facebook', [AuthController::class, 'login_facebook']);
    Route::get('/admin/callback', [AuthController::class, 'callback_facebook']);

    // Route Log out
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Register
    Route::post('/register', [UserController::class, 'store'])->name('process_register');

    // Shop page
    Route::get('/shop', [UserPageController::class, 'shopPage'])->name('shop');

    // Detail Product
    Route::get('/detail/{product}', [UserPageController::class, 'showDetailProduct'])->name('detail');

    // Reset pass
    Route::get('/page-reset', [ResetPassController::class, 'resetPassPage'])->name('page-reset');
    Route::get('/page-reset-pass', [ResetPassController::class, 'index'])->name('reset-pass');
    Route::post('/process-change-pass', [ResetPassController::class, 'processChangePass'])->name('process-change-pass');
});

Route::group([
    'middleware' => CheckLoginMiddleware::class,
    'as' => 'userpage.'
], function () {
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/save-cart', [CartController::class, 'store'])->name('save-cart');
    Route::get('/delete-row-cart/{rowId}', [CartController::class, 'deleteRowCart'])->name('delete-row-cart');
    Route::get('/destroy-all-cart', [CartController::class, 'destroy'])->name('destroy-cart');
    Route::post('/update-qty', [CartController::class, 'updateQty'])->name('update-qty');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/thank-you', [CheckoutController::class, 'thankYouPage'])->name('thank-you');
    Route::post('/save-checkout', [CheckoutController::class, 'store'])->name('save-checkout');

    // Coupon
    Route::post('/check-coupon', [CheckoutController::class, 'checkCoupon'])->name('check-coupon');
    Route::get('/delete-coupon-userpage', [CheckoutController::class, 'deleteCoupon'])->name('delete-coupon-userpage');

    //Order
    Route::get('/history-order/{user}', [OrderController::class, 'showHistoryOrderUser'])->name('history-order');
    Route::get('/detail-order/{order}', [OrderController::class, 'showDetailOrderUser'])->name('detail-order');
    Route::post('/cancel-order', [OrderController::class, 'cancelOrderUser'])->name('cancel-order');

    // User
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
    Route::get('/', [AdminController::class, 'index'])->name('index');

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

    // Route Coupon
    Route::get('/coupon', [CouponController::class, 'index'])->name('coupon');
    Route::get('/add-coupon', [CouponController::class, 'create'])->name('add-coupon');
    Route::post('/store-coupon', [CouponController::class, 'store'])->name('store-coupon');
    Route::get('/edit-coupon/{coupon}', [CouponController::class, 'edit'])->name('edit-coupon');
    Route::post('/update-coupon/{coupon}', [CouponController::class, 'update'])->name('update-coupon');

    // Route Supplier
    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::get('/add-supplier', [SupplierController::class, 'create'])->name('add-supplier');
    Route::post('/store-supplier', [SupplierController::class, 'store'])->name('store-supplier');
    Route::get('/edit-supplier/{supplier}', [SupplierController::class, 'edit'])->name('edit-supplier');
    Route::put('/update-supplier/{supplier}', [SupplierController::class, 'update'])->name('update-supplier');

    // Route Order
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/detail-order/{order}', [OrderController::class, 'show'])->name('show-order');
    Route::get('/confirm-order/{order}', [OrderController::class, 'confirmOrder'])->name('confirm-order');
    Route::post('/cancel_order', [OrderController::class, 'cancelOrder'])->name('cancel-order');

    // Route Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('/add-customer', [CustomerController::class, 'create'])->name('add-customer');
    Route::get('/view-customer/{user}', [CustomerController::class, 'show'])->name('view-customer');
    Route::post('/block-customer', [CustomerController::class, 'blockUser'])->name('block-customer');
    Route::post('/unblock-customer', [CustomerController::class, 'unblockUser'])->name('unblock-customer');

    // Route Admin
    Route::get('/list-admin', [AdminController::class, 'showListAdmin'])->name('admin');
    Route::get('/add-admin', [AdminController::class, 'create'])->name('add-admin');
    Route::get('/view-admin/{user}', [AdminController::class, 'show'])->name('view-admin');

    // dashboard
    Route::post('/filter-by-day', [AdminController::class, 'filterByDay'])->name('filter-by-day');
    Route::post('/filter-30-day', [AdminController::class, 'filter30Day'])->name('filter-30-day');

    // filter doanh số và lợi nhuận
    Route::post('/filter-sale', [AdminController::class, 'filterSale'])->name('filter-sale');
    Route::post('/filter-profit', [AdminController::class, 'filterProfit'])->name('filter-profit');
});
