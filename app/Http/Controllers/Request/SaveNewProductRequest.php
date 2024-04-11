<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;

class SaveNewProductRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string> */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'type' => 'required|string|max:30',
            'image' => 'required|string|max:200',
        ];
    
        return $rules;
    }
}