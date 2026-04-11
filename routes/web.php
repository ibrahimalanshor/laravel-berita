<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('home')
    ->get('/', [HomeController::class, 'index']);

Route::view('login', 'login')
    ->name('login');
Route::view('subscribe', 'subscribe')
    ->name('subscribe');
Route::view('search', 'search')
    ->name('search');
Route::get('pilihan-editor', [HomeController::class, 'featured'])
    ->name('featured');
Route::view('tag/{slug}', 'tag.detail')
    ->name('tag.detail');
Route::get('kategori/{category:slug}', [HomeController::class, 'category'])
    ->name('category.detail');
Route::view('halaman/{slug}', 'page.detail')
    ->name('page.detail');
Route::view('author/{slug}', 'page.detail')
    ->name('author.detail');
Route::get('{article:slug}', [HomeController::class, 'article'])
    ->name('article.detail');