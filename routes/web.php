<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
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
