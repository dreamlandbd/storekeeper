<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/form', [ProductController::class, 'showForm'])->name('product.form');
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'index'])->name('product');
Route::get('/products/sell/{id}', [ProductController::class, 'sellProduct'])->name('products.sell');
Route::post('/products/sell', [ProductController::class, 'sell']);

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
Route::get('/transaction-history', [DashboardController::class, 'showTransactionHistory'])->name('transaction.history');
