<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WebsiteController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;

Route::get('/',[WebsiteController::class,'index'])->name('home');
Route::get('single-product/{id}',[WebsiteController::class,'singleProduct'])->name('singleProduct');
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add.cart');
Route::get('cart-product',[CartController::class,'index'])->name('cart.products');
Route::get('cart/remove/{rowId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout/page', [CheckoutController::class, 'page'])->name('checkout.page');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('User-profile/{id}',[ProfileController::class,'profile'])->name('user.profile');
Route::get('User-order/{id}',[ProfileController::class,'userOrder'])->name('user.order');
Route::get('User-order-deliver/{id}',[ProfileController::class,'userOrderDeliver'])->name('user.order.deliver');




Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    dd('All Cleared...');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('jisan',[UserController::class,'jisan']);
