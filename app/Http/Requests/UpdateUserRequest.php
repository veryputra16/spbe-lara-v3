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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['sometimes', 'min:4', 'max:255', 'unique:users'],
            'email' => ['nullable', 'email:dns',  'max:255', 'unique:users'],
            'password' => ['nullable', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
            'status' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.regex' => 'Password harus mengandung huruf kecil, huruf besar, dan angka.',
            'password.confirmed' => 'Konfirmasi Password tidak sesuai.',
        ];
    }
}
