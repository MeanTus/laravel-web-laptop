<?php

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
});

Route::get('/login', function () {
    return view('userpage.login');
})->name('userpage.login');

Route::get('/register', function () {
    return view('userpage.register');
})->name('userpage.register');
