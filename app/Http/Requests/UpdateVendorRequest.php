<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
            'application_id' => ['sometimes'],
            'nama_pengembang' => ['sometimes', 'string'],
            'alamat_pengembang' => ['nullable', 'string', 'min:5', 'max:1000'],
            'nohp_pengembang' => ['sometimes', 'string', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
            'nokantor_pengembang' => ['nullable', 'numeric', 'digits_between:10,13'],
            'email_pengembang' => ['nullable', 'email', 'unique:users,email'],
        ];
    }
}
