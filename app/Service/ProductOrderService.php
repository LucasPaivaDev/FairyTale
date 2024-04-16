<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOrderService
{
    use SoftDeletes;
    
    public function __construct(private ProductOrder $productOrderModel) {
    }

    public function createProductOrder(array $orderData): string
    {
        
    }

    public function updateProductOrder(array $orderData): string
    {
        $updateProduct = $this->productOrderModel::where('name', '=', $productData['name'])->update(
        [
            'name' => 
        ]);

        if (empty($updateProduct)) {
            return 'Produto não encontrado';
        }
        return 'Produto atualizado com sucesso';
    }

    public function deleteProductOrder($id): string
    {
        $deleteOrder = $this->productOrderModel::where('id', '=', $id)->update(['deleted_at' => new \DateTime()]);

        if (empty($deleteOrder)) {
            return 'Pedido não encontrado';
        }
        return 'Pedido excluido com sucesso';
    }
}