<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeePositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestController;
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
    Route::get('/doi-mat-khau', [AccountController::class, 'showChangePasswordForm'])->name('changePassword');
    Route::post('/doi-mat-khau', [AccountController::class, 'changePassword'])->name('changePasswordPost');
});

Route::get('/recruitment', function () {
    return view('recruitment');
})->name('recruitment');


// admin/
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminBaseController::class, 'dashboard'])->name('dashboard');
    //account
    Route::get('/danh-sach-tai-khoan', [UserController::class, 'index'])->name('users.index');
    Route::get('/test', [TestController::class, 'index'])->name('test');
    Route::post('/danh-sach-tai-khoan', [UserController::class, 'store'])->name('users.store');
    Route::get('/tai-khoan/{id}/chinh-sua', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/tai-khoan/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/tai-khoan/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //role
    Route::get('/danh-sach-vai-tro', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/danh-sach-vai-tro', [RoleController::class, 'store'])->name('roles.store');
    Route::put('/vai-tro/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/vai-tro/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    //employee
    Route::get('/nhan-vien', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/nhan-vien/them-moi', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/nhan-vien', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/nhan-vien/{id}/chinh-sua', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/nhan-vien/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/nhan-vien/{employee_code}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');
    Route::get('/nhan-vien/tim-kiem', [EmployeeController::class, 'search'])->name('admin.employees.search');

    //contract
    Route::get('/hop-dong', [ContractController::class, 'index'])->name('contracts.index');
    Route::get('/hop-dong/them-moi', [ContractController::class, 'create'])->name('contracts.create');
    Route::post('/hop-dong', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/hop-dong/{id}/chinh-sua', [ContractController::class, 'edit'])->name('contracts.edit');
    Route::put('/hop-dong/{id}', [ContractController::class, 'update'])->name('contracts.update');
    Route::delete('/hop-dong/{id}', [ContractController::class, 'destroy'])->name('contracts.destroy');
    Route::get('/hop-dong/tim-kiem', [ContractController::class, 'search'])->name('contracts.search');

    //department
    Route::get('/phong-ban', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/phong-ban/them-moi', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/phong-ban', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/phong-ban/{id}/chinh-sua', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/phong-ban/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/phong-ban/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    //position
    Route::get('/chuc-vu', [EmployeePositionController::class, 'index'])->name('positions.index');
    Route::get('/chuc-vu/them-moi', [EmployeePositionController::class, 'create'])->name('positions.create');
    Route::post('/chuc-vu', [EmployeePositionController::class, 'store'])->name('positions.store');
    Route::get('/chuc-vu/{id}/chinh-sua', [EmployeePositionController::class, 'edit'])->name('positions.edit');
    Route::put('/chuc-vu/{id}', [EmployeePositionController::class, 'update'])->name('positions.update');
    Route::delete('/chuc-vu/{id}', [EmployeePositionController::class, 'destroy'])->name('positions.destroy');
});
