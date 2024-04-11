<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Orders;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersService
{
    use SoftDeletes;
    
    public function __construct(private Orders $productsModel) {
    }

    public function createOrder(array $productData): string
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

    public function updateOrder(array $productData): string
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

    public function deleteOrder($id): string
    {
        $deleteOrder = $this->productsModel::find($id)->delete();

        if (empty($deleteOrder)) {
            return 'Pedido não encontrado';
        }
        return 'Pedido excluido com sucesso';
    }
}