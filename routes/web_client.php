<?php

use App\Http\Controllers\Client\BrandController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ReviewController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::controller(BrandController::class)
    ->prefix('brands')
    ->name('brands.')
    ->group(function () {
        Route::get('{slug}', 'show')->name('show')->where('slug', '[a-z0-9-]+');
    });

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('compare', 'compare')->name('compare');
        Route::get('{slug}', 'show')->name('show')->where('slug', '[a-z0-9-]+');
    });

Route::controller(ReviewController::class)
    ->middleware('auth')
    ->prefix('reviews')
    ->name('reviews.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('', 'store')->name('store')->middleware(ProtectAgainstSpam::class);
    });

Route::middleware('guest')
    ->group(function () {
        Route::get('register', [RegisterController::class, 'create'])->name('register');
        Route::post('register', [RegisterController::class, 'store']);
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });