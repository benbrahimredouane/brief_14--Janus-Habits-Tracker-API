<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHabitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'frequency' => 'sometimes|required|in:daily,weekly,monthly',
            'target_days' => 'sometimes|required|integer|min:1',
            'color' => 'sometimes|required|string|max:50',
        ];
    }
}