<?php

namespace App\Http\Requests;

use App\Enums\PropertyStatus;
use Illuminate\Foundation\Http\FormRequest;

class PatchPropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'location' => 'sometimes|string',
            'status' => ['sometimes', 'string', 'in:'.implode(',', PropertyStatus::values())],
        ];
    }
}
