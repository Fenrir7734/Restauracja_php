<?php

use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('index');
})->name('index');
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
Route::get('/add-to-cart/{id}', [MenuController::class, 'addToCart'])->name('add-to-cart');
