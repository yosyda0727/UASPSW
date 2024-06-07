<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BookingController;

// Route::get('/admin', function () {
//     return view('admin.home');
// })->name('admin.home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('product', ProductController::class);
    Route::get('/booking/edit/status/{id}/{status}', [BookingController::class, 'updateStatus'])->name('admin.booking.edit.status');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/admin/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.updateRole');

});









