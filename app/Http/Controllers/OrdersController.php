<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\OrdersService;
use Illuminate\Http\JsonResponse;

class OrdersController
{
    public function __construct (private OrdersService $ordersService)
    {
    }

    public function createOrderAction(Request $request): JsonResponse
    {
        $output = $this->ordersService->createOrder($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    }

    public function updateOrderAction(Request $request): JsonResponse
    {
         $this->ordersService->updateOrder($request->json()->all());

        return response()->json('Pedido Atualizado', JsonResponse::HTTP_OK);
    }

    public function deleteOrderAction($id): JsonResponse
    {
        $output = $this->ordersService->deleteOrder($id);

        return response()->json($output, JsonResponse::HTTP_OK);
    }


}
