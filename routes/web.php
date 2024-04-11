<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('cadastraProdutos', function () {
    return 'gg';
}
);

Route::prefix('/product')->group(function () {
    Route::controller(ProductsController::class)->name('product.')->group(function () {
        Route::post('/create', 'saveNewProductAction')->name('productSave');
        Route::post('/update', 'updateProductAction')->name('productUpdate');
        Route::post('/delete', 'deleteProductAction')->name('productDelete');
    });
});