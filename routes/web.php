<?php

declare(strict_types=1);

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/material');

Route::controller(MaterialController::class)->name('material.')->group(function () {
    Route::get('/material/{id?}', 'show')->name('show');
});

Route::controller(TagController::class)->name('tag.')->group(function () {
    Route::get('/tag/{id?}', 'show')->name('show');
});

Route::controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/category/{id?}', 'show')->name('show');
});
