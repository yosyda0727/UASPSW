<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;

require __DIR__ . '/admin.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function () {
    // Menampilkan halaman login

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

    // Menangani proses login
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login')->middleware('guest');

    // Menampilkan halaman register
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

    // Menangani proses registrasi
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register')->middleware('guest');

    // Menangani proses logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::resource('/product', ProductController::class);

    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

    Route::get('/booking/create/{id}', [BookingController::class, 'createByid'])->name('booking.createByid');

    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    Route::get('/booking/edit/status/{id}/{status}', [BookingController::class, 'updateStatus'])->name('booking.edit.status');

});
