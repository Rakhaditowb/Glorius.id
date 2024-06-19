<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();


// Guest
Route::middleware('guest')->withoutMiddleware('auth')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest.index');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail', [HomeController::class, 'details'])->name('detail')->withoutMiddleware('auth');


// Admin
Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});