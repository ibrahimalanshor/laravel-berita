<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('home')
    ->get('/', [HomeController::class, 'index']);

Route::view('login', 'login')
    ->name('login');
Route::get('subscribe', [HomeController::class, 'subscribe'])
    ->name('subscribe');
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
Route::get('{article:slug}', [HomeController::class, 'article'])
    ->name('article.detail');