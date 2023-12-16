<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeGroupController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(ProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(ReviewController::class)
            ->prefix('reviews')
            ->name('reviews.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(BrandController::class)
            ->prefix('brands')
            ->name('brands.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(AttributeGroupController::class)
            ->prefix('attributeGroups')
            ->name('attributeGroups.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(AttributeController::class)
            ->prefix('attributes')
            ->name('attributes.')
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(AttributeValueController::class)
            ->prefix('attributeValues')
            ->name('attributeValues.')
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(UserController::class)
            ->prefix('users')
            ->name('users.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9]+');
                Route::put('/{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('/{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });
    });