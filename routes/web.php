<?php

// use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('template');
});


Route::get('/', [SiteController::class, "getHome"]);
Route::get('/about-us', [SiteController::class, "getAbout"]);

Route::get('/product', [SiteController::class, "getProduct"]);

// Route::get('/category', [SiteController::class, "getCategory"]);

Route::get('/contact-us', [SiteController::class, "getContact"]);



Route::get('/product-details/{id}', [SiteController::class, 'getProductDetails'])->name('product.details');

Route::get('/add-to-cart', [SiteController::class, "getAddtoCart"]);

Auth::routes();
// Route::get('/   ', [ProductController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('category')->group(function () {
    Route::get('/');
    Route::get('/{category}');
    Route::post('/add');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');




// Manage Category
Route::get('/category', [HomeController::class, "getCategory"])->name('category');

Route::post('/postAddCategory', [HomeController::class, 'postAddCategory'])->name('postAddCategory');
// Manage Product
Route::get('/product', [HomeController::class, "getProduct"])->name('product');

Route::post('/postAddProduct', [HomeController::class, 'postAddProduct'])->name('postAddProduct');

// Esewa Integration
Route::post('/esewa/pay', [HomeController::class, 'paideSewa'])->name('esewa.pay');

Route::middleware('auth')->group(function () {
    Route::get('/add-to-cart', [CartController::class, 'showCart'])->name('add.to.cart');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::get('/checkout', [CartController::class, 'getCheckout'])->name('checkout');
    // // Checkout Process Route
    // Route::post('/checkout/process', [CartController::class, 'processCheckout'])->name('checkout.process');
});
