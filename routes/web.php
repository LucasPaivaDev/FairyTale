<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('cadastraProdutos', 'ProductsController@saveNewProduct'
);

Route::prefix('/product')->group(function (): void {
    Route::controller(ProductsController::class)->name('product.')->group(function (): void {
        Route::post('/create', 'saveNewProductAction')->name('productSave');
        Route::post('/update', 'updateProductAction')->name('productUpdate');
        Route::post('/delete', 'deleteProductAction')->name('productDelete');
    });
});