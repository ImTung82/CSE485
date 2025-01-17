<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// returns the home page with all products
Route::get('/', [ProductController::class, 'index'])->name('products.index');
// returns the form for adding a product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// adds a product to the database
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// returns a page that shows a full product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// returns the form for editing a product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// updates a product
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// deletes a product
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');