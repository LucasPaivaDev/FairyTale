<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\UnprocessableContentException;

class NewProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => 'required|string|max:200',
            "value" => 'required|numeric|min:0',
            "image" => 'required|string|max:200',
            "type" => 'required|string|max:200',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new UnprocessableContentException($validator);
    }
}
