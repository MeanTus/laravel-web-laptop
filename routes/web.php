<?php

use App\Http\Controllers\AuthController;
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

Route::get('/register', function () {
    return view('userpage.register');
})->name('userpage.register');
