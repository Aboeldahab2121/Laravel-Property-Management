<?php

namespace App\Http\Requests;

use App\Enums\PropertyStatus;
use Illuminate\Foundation\Http\FormRequest;

class PostPropertyRequest extends FormRequest
{
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
            'status' => ['required', 'string', 'in:' . implode(',', PropertyStatus::values())],
        ];
    }
}
