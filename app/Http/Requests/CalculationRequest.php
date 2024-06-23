<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_number' => ['required', 'numeric'],
            'second_number' => ['required'],
            'operator' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
