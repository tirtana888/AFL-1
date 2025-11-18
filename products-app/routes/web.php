<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::group(['prefix'=>'products', 'as'=>'products.'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::post('/update', [ProductController::class, 'update'])->name('update');
    Route::get('/show', [ProductController::class, 'show'])->name('show');
});
