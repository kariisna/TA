<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/user', function () { return view('admin.user'); })->name('admin.user');
    Route::get('/jadwal', function () { return view('admin.jadwal'); })->name('admin.jadwal');
    Route::get('/create', function () { return view('admin.create'); })->name('admin.create');
});

Route::prefix('user')->group(function () {
    Route::get('/', function () { return view('user.dashboard'); })->name('user.dashboard');
    Route::get('/profile', function () { return view('user.profile'); })->name('user.profile');
    Route::get('/catatan', function () { return view('user.catatan'); })->name('user.catatan');
    Route::get('/jadwal', function () { return view('user.jadwal'); })->name('user.jadwal');
});

Route::prefix('konsoler')->group(function () {
    Route::get('/', function () { return view('konsoler.index'); })->name('konsoler.index');
});

Route::get('/login', [LoginController ::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



