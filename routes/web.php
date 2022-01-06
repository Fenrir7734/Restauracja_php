<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\AddressesController;
use \App\Http\Controllers\AdminPanelController;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\BookingController;
use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\AdminBookingController;
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
    Route::get('/index-order', [OrderController::class, 'index'])->name('create-order');
    Route::get('/history-order/{filter}/{sort}', [OrderController::class, 'create'])->name('history-order');
    Route::get('/order_details/{id}', [OrderController::class, 'content'])->name('order-details');
    Route::post('/filter', [OrderController::class, 'filter'])->name('order-filter');
    Route::get('/booking-history', [BookingController::class, 'index'])->name('booking-history');
    Route::get('/booking-details/{id}', [BookingController::class, 'edit'])->name('booking-details');
    Route::get('/booking-details-cancel/{id}', [BookingController::class, 'cancel'])->name('booking-cancel');
    Route::get('/account_details', [AccountController::class, 'index'])->name('account');
    Route::post('/account_details', [AccountController::class, 'update'])->name('update-account');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin-panel', [AdminPanelController::class, 'index'])->name('admin-panel');

    Route::get('/categories-create', [CategoriesController::class, 'create'])->name('create-category');
    Route::post('/categories-store', [CategoriesController::class, 'store'])->name('store-category');
    Route::get('/categories-preview', [CategoriesController::class, 'index'])->name('admin-categories-preview');
    Route::get('/categories-delete/{id}', [CategoriesController::class, 'destroy'])->name('remove-category');
    Route::get('/categories-edit/{id}', [CategoriesController::class, 'edit'])->name('edit-category');
    Route::post('/categories-update/{id}', [CategoriesController::class, 'update'])->name('update-category');

    Route::get('/products-create', [ProductsController::class, 'create'])->name('create-products');
    Route::post('/products-store', [ProductsController::class, 'store'])->name('store-products');
    Route::get('/products-preview', [ProductsController::class, 'index'])->name('admin-products-preview');
    Route::get('/products-delete/{id}', [ProductsController::class, 'destroy'])->name('remove-products');
    Route::get('/products-edit/{id}', [ProductsController::class, 'edit'])->name('edit-products');
    Route::post('/products-update/{id}', [ProductsController::class, 'update'])->name('update-products');

    Route::get('/admin-booking-create', [AdminBookingController::class, 'create'])->name('create-admin-booking');
    Route::post('/admin-booking-store', [AdminBookingController::class, 'store'])->name('store-admin-booking');
    Route::get('/admin-booking-preview', [AdminBookingController::class, 'index'])->name('preview-admin-booking');
    Route::get('/admin-booking-delete/{id}', [AdminBookingController::class, 'destroy'])->name('remove-admin-booking');
    Route::get('/admin-booking-edit/{id}', [AdminBookingController::class, 'edit'])->name('edit-admin-booking');
    Route::post('/admin-booking-update/{id}', [AdminBookingController::class, 'update'])->name('update-admin-booking');
});


Route::get('/order-complete', function () {
    return view('/order_complete');
})->name('order-complete');

Route::get('/booking-complete', function () {
    return view('/booking_complete');
})->name('booking-complete');

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
Route::get('/booking', [BookingController::class, 'create'])->name('booking-create');
Route::post("/booking", [BookingController::class, 'store'])->name('booking-store');
