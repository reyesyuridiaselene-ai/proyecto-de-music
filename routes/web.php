<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route:: get('/login', [AuthController:: class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');

    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
