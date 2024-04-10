<?php

namespace App\Http\Controllers;

use App\Domain\Contact\Domain\Service\ProductsService;
use Illuminate\Http\JsonResponse;

class ProductsController
{
    public function __construct (private ProductsService $productsService)
    {
    }

    public function saveNewProductAction(ContactEmailRequest $request): JsonResponse
    {
        $output = $this->contactApplication->sendEmail(new InputContactEmail($request));

        return response()->json($output, JsonResponse::HTTP_OK);
    } 


}
