<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\ProductOrder;
use App\Service\ProductsService;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOrderService
{
    use SoftDeletes;
    
    public function __construct(private ProductOrder $productOrderModel, private ProductsService $productsService) 
    {
    }

    public function updateOrCreateProductOrder(array $productOrderData)
    {
        $this->productOrderModel->updateOrCreate(
            [
                "id_order" => $productOrderData['order_id'],
                "id_product" => $productOrderData['product_id']
            ],
            [
                "id_order" => $productOrderData['order_id'],
                "id_product" => $productOrderData['product_id'],
                "quantity" => $productOrderData['quantity']
            ]
        );
    }

    public function deleteProductOrder($id): string
    {
        $deleteOrder = $this->productOrderModel::where('id', '=', $id)->update(['deleted_at' => new \DateTime()]);

        if (empty($deleteOrder)) {
            return 'Pedido não encontrado';
        }
        return 'Pedido excluido com sucesso';
    }

    private function getTotalValueByOrderId(int $orderId): ?float
    {
        $orderProductData = $this->productOrderModel->getProductsAndQuantityByOrderId($orderId);
        if (!$orderProductData) {
            return null;
        }

        $totalValue = 0;
        foreach ($orderProductData as $orderProduct) {
            $product = $this->productsService->getProductById($orderProduct['id_product']);
            $totalValue += $product['value'] * $orderProduct['quantity'];
        }

        return $totalValue;
    }
}