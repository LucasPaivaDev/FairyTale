<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProductsService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\NewProductRequest;

class ProductsController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function saveNewProductAction(NewProductRequest $request): JsonResponse
    {
        $output = $this->productsService->saveNewProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 

    public function updateProductAction(Request $request): JsonResponse
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
