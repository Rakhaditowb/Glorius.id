<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.home.index');
// });

// Guest
Route::get('/', [GuestController::class, 'index'])->name('guest.index')->withoutMiddleware('auth');