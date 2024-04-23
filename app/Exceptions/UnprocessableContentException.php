<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class UnprocessableContentException extends ValidationException
{
    public function render(): JsonResponse
    {
        $errors = $this->validator->errors()->all();

        return response()->json([
            'success' => false,
            'error' => true,
            'response' => [
                'message' => $this->getMessageFormated($errors),
                'errors' => $errors
            ]
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param array<string> $errors
     */
    private function getMessageFormated(array $errors): string
    {
        $errorsAmount = count($errors);
        
        if ($errorsAmount === 1) {
            return array_shift($errors);
        }

        $afterMessage = 'exception.and_more_error';
        if ($errorsAmount > 2) {
            $afterMessage = 'exception.and_more_errors';
        }

        return array_shift($errors) . " " . trans($afterMessage, ['amount' => ($errorsAmount - 1)]);
    }    
}
