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

    public function updateOrCreateProductOrder(array $productOrderData): string
    {
        $this->productOrderModel->updateOrCreate(
            [
                "id_order" => $productOrderData['order_id'],
                "id_product" => $productOrderData['product_id']
            ],
            [
                "id_order" => $productOrderData['order_id'],
                "id_product" => $productOrderData['product_id'],
                "quantity" => $productOrderData['quantity']//$this->calculateTotalProductsValue($productOrderData['product_id'], $productOrderData['quantity']),
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

    private function getTotalValueByOrderId(int $orderId)
    {
        $productModel = $this->productsService->getProductById($productId);
        $produc
        

    }
}