<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::name('home')
    ->get('/', [HomeController::class, 'index']);

Route::controller(AuthController::class)
    ->group(function () {
        Route::post('logout', 'logout')
            ->name('logout')
            ->middleware('auth');

        Route::middleware('guest')
            ->group(function () {
                Route::get('login', 'login')
                    ->name('login');

                Route::prefix('auth/google')
                    ->name('auth.google')
                    ->group(function () {
                        Route::get('/', 'redirectToGoogle');
                        Route::get('/callback', 'handleGoogleCallback');
                    });
            });
    });

Route::controller(ProfileController::class)
    ->prefix('profile')
    ->name('profile.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'view')
            ->name('index');
        Route::post('/', 'update')
            ->name('update');
        Route::get('baca-nanti', 'bookmark')
            ->name('bookmark');
        Route::get('favorit', 'favourite')
            ->name('favourite');
        Route::get('subscription', 'subscription')
            ->name('subscription');
    });

Route::get('search', [HomeController::class, 'search'])
    ->name('search');
Route::get('berita', [HomeController::class, 'news'])
    ->name('news');
Route::get('pilihan-editor', [HomeController::class, 'featured'])
    ->name('featured');
Route::get('premium', [HomeController::class, 'premium'])
    ->name('premium');
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
        Route::post('/', 'checkout')
            ->middleware('auth')
            ->name('checkout');
    });
    
Route::controller(ArticleController::class)
    ->name('article.')
    ->prefix('{article:slug}')
    ->group(function () {
        Route::middleware('auth')
            ->group(function () {
                Route::post('/bookmark', 'bookmark')
                    ->name('bookmark');
                Route::post('/favorite', 'favorite')
                    ->name('favorite');
                Route::post('/comment', 'comment')
                    ->name('comment');
            });
        Route::get('/', 'view')
            ->name('detail');
    });