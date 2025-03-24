<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->name("home");

Route::prefix('/account')->name('account.')->group(function () {
    Route::get('/dang-ky', [AccountController::class, 'register'])->name('register');
    Route::post('/dang-ky', [AccountController::class, 'save'])->name('save');
    Route::get('/dang-nhap', [AccountController::class, 'login'])->name('login');
    Route::post('/dang-nhap', [AccountController::class, 'auth'])->name('auth');
    Route::post('/dang-xuat', [AccountController::class, 'logout'])->name('logout');
});

Route::get('/recruitment', function () {
    return view('recruitment');
})->name('recruitment');
