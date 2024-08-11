<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;

Route::group(['prefix' => 'admin', 'middleware' => ['web']], function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class,'authenticate'])->name('admin.login.submit');
    Route::post('logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function()
    {
        Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
        Route::resource('category',CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('orders',[OrderController::class,'index'])->name('admin.orders');
        Route::get('orders-details/{id}',[OrderController::class,'ordersDetails'])->name('admin.orders.details');
        Route::post('confirm-order/{id}',[OrderController::class,'confirmOrder'])->name('admin.order.confirm');
        Route::get('confirm-order/list',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.list');
        Route::get('confirm-order/filter/{status}',[OrderController::class,'confirmOrderList'])->name('admin.order.confirm.filter');
    });
});
