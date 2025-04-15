<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoginController;

Route::prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    
    // Counseling Schedule Routes
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/today', [ScheduleController::class, 'today'])->name('jadwal.today');
    Route::get('/jadwal/this-week', [ScheduleController::class, 'thisWeek'])->name('jadwal.this-week');
    Route::post('/jadwal', [ScheduleController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [ScheduleController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [ScheduleController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [ScheduleController::class, 'destroy'])->name('jadwal.destroy');
    Route::patch('/jadwal/{id}/status', [ScheduleController::class, 'updateStatus'])->name('jadwal.update-status');
    Route::get('/get-student-class/{id}', [ScheduleController::class, 'getStudentClass'])->name('get-student-class');
    
    // user
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('/user/create', [UserController::class, 'store'])->name('admin.user.store');
    Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('admin.user.update');


    // Route::get('/jadwal', function () { return view('admin.jadwal'); })->name('admin.jadwal');
    // Route::get('/create', function () { return view('admin.create'); })->name('admin.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return view('user.dashboard'); })->name('user.dashboard');
    Route::get('/profile', function () { return view('user.profile'); })->name('user.profile');
    Route::get('/catatan', function () { return view('user.catatan'); })->name('user.catatan');
    Route::get('/jadwal', function () { return view('user.jadwal'); })->name('user.jadwal');
});

Route::prefix('konsoler')->group(function () {
    Route::get('/', function () { return view('konsoler.index'); })->name('konsoler.index');
});

Route::get('/', [LoginController::class, 'showLoginForm'])->name('/');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'logout'])->name('logout');
