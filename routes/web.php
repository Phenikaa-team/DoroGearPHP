<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/{id}/upload-image', [ProductController::class, 'uploadImage'])->name('product.uploadImage');
});
