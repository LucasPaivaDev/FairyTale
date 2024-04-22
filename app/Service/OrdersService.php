<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Orders;
use App\Service\ProductOrderService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersService
{
    use SoftDeletes;
    
    public function __construct(
        private Orders $productsModel, 
        private ProductOrderService $productOrderService
    ) {
    }

    public function createOrder(array $orderData): ?Model
    {
        return $this->productsModel::create(
        [
            'value' => $orderData['value'],
            'status' => $orderData['status'],
        ]);
    }

    public function updateOrder(array $orderData): ?Model
    {
        foreach ($orderData as $product) {
            $this->productOrderService->updateOrCreateProductOrder($product);
        }

        $totalValue = $this->productOrderService->getTotalValueByOrderId();
    }

    public function deleteOrder($id): string
    {
        $deleteOrder = $this->productsModel::where('id', '=', $id)->update(['deleted_at' => new \DateTime()]);

        if (empty($deleteOrder)) {
            return 'Pedido não encontrado';
        }
        return 'Pedido excluido com sucesso';
    }
}