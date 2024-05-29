<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    $latest_products = Product::latest()->take(5)->get();
    $random = Product::select('id', 'model' ,'memory', 'price', 'image')->take(3)->get();
    return view('layouts.content', compact('latest_products', 'random'));
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

});

Route::get('/products/{product}', [ProductController::class, 'detailed'])->name('detailed.product.show');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/submit-order', [CartController::class, 'submitOrder'])->name('submit-order');
Route::delete('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
Route::post('/decrement-item/{product}', [CartController::class, 'decrementItem'])->name('decrement-item');
Route::get('/catalog', [ProductController::class, 'catalog'])->name('catalog');

require __DIR__.'/auth.php';
