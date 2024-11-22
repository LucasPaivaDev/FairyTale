<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProductsService;
use Illuminate\Http\JsonResponse;

class UserController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function loginAction(Request $request): JsonResponse
    {
        $output = $this->productsService->saveNewProduct($request->json()->all());

        return response()->json($output, JsonResponse::HTTP_OK);
    } 
}
