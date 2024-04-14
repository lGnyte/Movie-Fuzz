<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4|max:255',
            'username' => 'required|min:4|max:255|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.min' => 'The name must be at least 4 characters long.',
            'name.max' => 'The name must not be greater than 255 characters.',
            'username.required' => 'Please enter a username.',
            'username.min' => 'The username must be at least 4 characters long.',
            'username.max' => 'The username must not be greater than 255 characters.',
            'username.string' => 'The username may only contain letters, numbers, dashes, and underscores.',
        ];
    }
}
