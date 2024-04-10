<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;

class ContactEmailRequest extends Request
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
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
        ];
    
        return $rules;
    }
}