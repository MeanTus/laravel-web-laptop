<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// Route home page
Route::get('/', function () {
    return view('userpage.index');
})->name('userpage.index');

// Route Login
Route::get('/login', [AuthController::class, 'login'])->name('userpage.login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');

// Route Log out
Route::get('/logout', [AuthController::class, 'logout'])->name('userpage_logout');

// Route Register
Route::get('/register', [UserController::class, 'create'])->name('userpage.register');
Route::post('/register', [UserController::class, 'store'])->name('process_register');
