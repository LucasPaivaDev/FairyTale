<?php

namespace App\Http\Controllers;

use App\Service\ProductsService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Request\UpdateProductRequest;
use App\Http\Controllers\Request\SaveNewProductRequest;

class ProductsController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function saveNewProductAction(SaveNewProductRequest $request): JsonResponse
    {
        $output = $this->productsService->saveNewProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 

    public function updateProductAction(UpdateProductRequest $request): JsonResponse
    {
        $output = $this->productsService->updateProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 

    public function deleteProductAction($id): JsonResponse
    {
        $output = $this->productsService->deleteProduct($id);

        return response()->json($output, JsonResponse::HTTP_OK);
    }


}
