<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Products;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function deleteProduct($id)
    {
        $deleteProduct = $this->productsModel::where('id', '=', $id)->update(['deleted_at' => new \DateTime()]);

        if (empty($deleteProduct)) {
            return 'Pedido não encontrado';
        } 
        return 'Pedido excluido com sucesso';
    }

    public function getProductById($id)
    {
        return $this->productsModel->findBy();
    }
}