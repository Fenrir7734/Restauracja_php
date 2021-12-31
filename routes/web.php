<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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

Route::get('/welcome', function () {
    return view('/welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/cart', function () {
    return view('/cart');
})->name('cart');

Route::get('/contact', function () {
    return view('/contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('/gallery');
})->name('gallery');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
