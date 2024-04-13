<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !Auth::check();
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
            'username' => 'required|min:4|max:255|unique:users|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'terms' => 'accepted',
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
            'terms.accepted' => 'You must agree to the terms.',
            'name.required' => 'Please enter your name.',
            'name.min' => 'The name must be at least 4 characters long.',
            'name.max' => 'The name must not be greater than 255 characters.',
            'username.required' => 'Please enter a username.',
            'username.min' => 'The username must be at least 4 characters long.',
            'username.unique' => 'The username is already taken.',
            'username.max' => 'The username must not be greater than 255 characters.',
            'username.string' => 'The username may only contain letters, numbers, dashes, and underscores.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters long.',
        ];
    }
}
