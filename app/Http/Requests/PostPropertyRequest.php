<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string',
            'status' => 'required|in:available,under_review,approved,sold'
        ];
    }
}
