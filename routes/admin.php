<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('guest:admin')
            ->group(function () {
                Route::get('/login', [AuthController::class, 'login'])
                    ->name('login');
                Route::post('/login', [AuthController::class, 'submitLogin'])
                    ->name('submit-login');
            });

        Route::middleware('auth:admin')
            ->group(function () {
                Route::get('/', [DashboardController::class, 'index'])
                    ->name('dashboard');
            });
    });