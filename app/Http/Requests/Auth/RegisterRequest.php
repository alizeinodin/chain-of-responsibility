<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'string',
            'lastname' => 'string',
            'email' => 'email|unique:users,email',
            'phone' => 'string|unique:users,phone|min:11|max:12',
            'password' => 'string|min:8|max:128'
        ];
    }
}
