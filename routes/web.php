<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::name('home')
    ->get('/', [HomeController::class, 'index']);

Route::view('login', 'login')
    ->name('login');
Route::prefix('auth/google')
    ->name('auth.google')
    ->group(function () {
        Route::get('/', [AuthController::class, 'redirectToGoogle']);
        Route::get('/callback', [AuthController::class, 'handleGoogleCallback']);
    });

Route::get('search', [HomeController::class, 'search'])
    ->name('search');
Route::get('berita', [HomeController::class, 'news'])
    ->name('news');
Route::get('pilihan-editor', [HomeController::class, 'featured'])
    ->name('featured');
Route::get('tag/{tag:slug}', [HomeController::class, 'tag'])
    ->name('tag.detail');
Route::get('kategori/{category:slug}', [HomeController::class, 'category'])
    ->name('category.detail');
Route::get('halaman/{page:slug}', [HomeController::class, 'page'])
    ->name('page.detail');
Route::get('author/{author:slug}', [HomeController::class, 'author'])
    ->name('author.detail');

Route::controller(SubscribeController::class)
    ->prefix('subscribe')
    ->name('subscribe.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/checkout/{package:slug}', 'checkout')
            ->name('checkout');
    });
    
Route::get('{article:slug}', [HomeController::class, 'article'])
    ->name('article.detail');