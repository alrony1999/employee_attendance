<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureAdminnIsValid;

Route::get('/', [HomeController::class, 'home']);

Route::post('/login', [SessionController::class, 'login']);

Route::middleware(['employee'])->group(function () {
    Route::get('/employee/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('employee/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('employee/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('employee/logout', [SessionController::class, 'destroy'])->name('logout');

    Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'dashboard'])->name('employee');
    Route::get('/employee/dshboard/check', [EmployeeDashboardController::class, 'checkAttendance']);
    Route::post('/employee/daily-attendance', [EmployeeDashboardController::class, 'dailyAttendance']);
    Route::get('/employee/attendance/{id}', [AdminDashboardController::class, 'attendance'])->name('attendance');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/adminDashboard', [AdminDashboardController::class, 'dashboard'])->name('admin');
    Route::view('/admin/add-employee', 'add-employee');
    Route::post('/admin/add-employee', [AdminDashboardController::class, 'addEmployee'])->name('admin.add-employee');
});

Route::fallback(function () {
    return redirect('/');
});
