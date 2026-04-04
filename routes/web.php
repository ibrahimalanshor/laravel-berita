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
Route::view('tag/{slug}', 'tag.detail')
    ->name('tag.detail');
Route::view('category/{slug}', 'category.detail')
    ->name('category.detail');
Route::view('{slug}', 'article.detail')
    ->name('article.detail');