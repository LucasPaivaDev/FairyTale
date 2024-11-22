<?php

namespace App\Http\Controllers;

use App\Service\ProductsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function saveNewProductAction(Request $request): JsonResponse
    {
        $output = $this->productsService->saveNewProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 

    public function updateProductAction(Request $request): JsonResponse
    {
        $output = $this->productsService->updateProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 


}
