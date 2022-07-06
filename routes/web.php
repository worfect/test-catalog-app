<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/material');

Route::prefix('material')->controller(MaterialController::class)->name('material.')->group(static function () {
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::post('/remove/{id}', 'remove')->name('remove');
    Route::post('/store', 'store')->name('store');
    Route::post('/{id}/update', 'update')->name('update');
});

Route::prefix('tag')->controller(TagController::class)->name('tag.')->group(static function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/store', 'store')->name('store');
    Route::post('/bind', 'bind')->name('bind');
    Route::post('/unbind', 'unbind')->name('unbind');
    Route::post('/remove/{id}', 'remove')->name('remove');
});

Route::prefix('link')->controller(LinkController::class)->name('link.')->group(static function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/{id}/update', 'update')->name('update');
    Route::post('/remove/{id}', 'remove')->name('remove');
});

Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(static function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/{id}/update', 'update')->name('update');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/store', 'store')->name('store');
    Route::post('/remove/{id}', 'remove')->name('remove');
});
