<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Products;

class ProductsService
{
    protected Products $productsModel;

    public function __construct(Products $productsModel) {
        $this->productsModel = $productsModel;
    }

    public function saveNewProduct(array $productData)
    {
        $this->productsModel::updateOrCreate(
        ['name' => $productData['name']],
        [
            'name' => $productData['name'],
            'value' => $productData['value'],
            'type' => $productData['type'],
            'image' => $productData['image'],
        ]);

        return 'Produto salvo com sucesso';
    }

    public function updateProduct(array $productData)
    {
        $updateProduct = $this->productsModel::where('name', '=', $productData['name'])->update(
        [
            'name' => $productData['name'],
            'value' => $productData['value'],
            'type' => $productData['type'],
            'image' => $productData['image'],
        ]);

        if (empty($updateProduct)) {
            return 'Produto não encontrado';
        }
        return 'Produto atualizado com sucesso';
    }
}