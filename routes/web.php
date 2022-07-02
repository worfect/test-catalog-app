<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/material');

Route::prefix('material')->controller(MaterialController::class)->name('material.')->group(function() {
    Route::get('/{id}/edit/', 'edit')->name('edit');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
});

Route::prefix('tag')->controller(TagController::class)->name('tag.')->group(function () {
    Route::post('/bind', 'bind')->name('bind');
    Route::post('/unbind', 'unbind')->name('unbind');
    Route::get('/', 'index')->name('index');
});

Route::prefix('link')->controller(LinkController::class)->name('link.')->group(function () {
    Route::post('/create', 'create')->name('create');
    Route::post('/{id}/edit', 'edit')->name('edit');
    Route::post('/remove', 'remove')->name('remove');
});

Route::controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/category', 'index')->name('index');
});
