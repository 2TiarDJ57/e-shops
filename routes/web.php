<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('index.products');
});



Auth::routes();

Route::get('/products', [ProductController::class, 'index'])->name('index.products');

Route::middleware(['admin'])->group(function(){
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('update.product');
    Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('destroy.product');

    Route::post('/orders/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm.payment');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('show.product');



    Route::post('/cart/{product}', [CartController::class, 'addCart'])->name('add.cart');
    Route::get('/cart', [CartController::class, 'showCart'])->name('show.cart');
    Route::put('/cart/{cart}', [CartController::class, 'editCart'])->name('edit.cart');
    Route::delete('/cart/{cart}', [CartController::class, 'destroyCart'])->name('destroy.cart');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'indexOrder'])->name('index.order');
    Route::get('/orders/{order}', [OrderController::class, 'showOrder'])->name('show.order');
    Route::post('/orders/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit.payment');


    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show.profile');
    Route::put('/profile/edit', [ProfileController::class, 'edit_profile'])->name('edit.profile');
});



