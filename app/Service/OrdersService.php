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
        private Orders $ordersModel,
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

    public function updateOrder(array $orderData)
    {
        $orderId = (int) $orderData['id_order'];
        foreach ($orderData['products'] as $product) {
            $this->productOrderService->updateOrCreateProductOrder($product, $orderId);
        }

        $totalValue = $this->productOrderService->getTotalValueByOrderId($orderId);
        $this->ordersModel->updateOrCreate(
            [
                'id' => $orderData['id_order']
            ],
            [
                'value' => $totalValue,
            ]
        );
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
