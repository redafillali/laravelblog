<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\UserController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');
    });

    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}/destroy', [UserController::class, 'destroy'])->name('destroy');
            Route::get('/{id}/block', [UserController::class, 'block'])->name('block');
            Route::get('/{id}/unblock', [UserController::class, 'unblock'])->name('unblock');

        });
    });
});


Route::view('/admin/login', 'back.pages.auth.login')->name('login');
