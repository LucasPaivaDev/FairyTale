<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Domain\Contact\Domain\Service\ProductsService;
use App\Http\Controllers\Request\SaveNewProductRequest;

class ProductsController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function saveNewProductAction(SaveNewProductRequest $request): JsonResponse
    {
        dd($request);
        $output = $this->productsService->saveNewProduct($request);

        return response()->json($output, JsonResponse::HTTP_OK);
    } 


}
