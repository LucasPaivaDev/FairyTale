<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;

Route::prefix('/product')->group(function () {
    Route::controller(ProductsController::class)->name('product.')->group(function () {
        Route::post('/create', 'saveNewProductAction')->name('productSave');
        Route::post('/update', 'updateProductAction')->name('productUpdate');
        Route::delete('/delete/{id}', 'deleteProductAction')->name('productDelete');
    });
});

Route::prefix('/order')->group(function () {
    Route::controller(OrdersController::class)->name('order.')->group(function () {
        Route::post('/create', 'createOrderAction')->name('orderSave');
        Route::post('/update', 'updateOrderAction')->name('orderUpdate');
        Route::delete('/delete/{id}', 'deleteOrderAction')->name('orderDelete');
    });
});

Route::prefix('/sales')->group(function () {
    Route::controller(SalesController::class)->name('order.')->group(function () {
        Route::post('/create', 'createSaleAction')->name('saleSave');
        Route::post('/update', 'updateSaleAction')->name('saleUpdate');
        Route::delete('/delete/{id}', 'deleteSale')->name('saleDelete');
    });
});