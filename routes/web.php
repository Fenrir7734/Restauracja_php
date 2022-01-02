<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
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
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::post('/create-order', [OrderController::class, 'store'])->name('store-order');
    Route::get('/create-order', [OrderController::class, 'create'])->name('create-order');

});

Route::get('/order-complete', function () {
    return view('/order_complete');
})->name('order-complete');

Route::get('/error', function () {
    return view('/error');
})->name('error');

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
Route::patch('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/remove-all', [CartController::class, 'removeAll'])->name('remove-all');
Route::patch('/update-cart', [CartController::class, 'updateCart'])->name('update-cart');
Route::delete('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

