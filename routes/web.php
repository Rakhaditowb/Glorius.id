<?php

use App\Http\Controllers\Admin\AdminItemController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\AdminProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();


// Guest
Route::middleware('guest')->withoutMiddleware('auth')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [HomeController::class, 'details'])->name('detail')->withoutMiddleware('auth');

// Akun
Route::resource('profile', ProfileController::class);


// Admin
Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    //// user
    Route::post('/user', [DashboardController::class, 'userStore'])->name('admin.user.store');
    Route::put('/user/{id}', [DashboardController::class, 'userUpdate'])->name('admin.user.update');
    Route::delete('/user/{id}', [DashboardController::class, 'userDestroy'])->name('admin.user.destroy');

    //// product
    Route::resource('product', AdminProductController::class);

    //// item
    Route::resource('item', AdminItemController::class);

    //// payment
    Route::resource('payment', AdminPaymentController::class);
});
