<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'], 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do hábito é obrigatório.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
        ];
    }
}