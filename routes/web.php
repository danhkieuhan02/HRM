<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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


// admin/
Route::prefix('/admin')->name('admin.')->group(function () {
    //account
    Route::get('/danh-sach-tai-khoan', [UserController::class, 'index'])->name('users.index');
    Route::get('/test', [App\Http\Controllers\Admin\TestController::class, 'index'])->name('test');

    //role
    // Route cho Role
    Route::get('/danh-sach-vai-tro', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/danh-sach-vai-tro', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/vai-tro/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/vai-tro/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});
