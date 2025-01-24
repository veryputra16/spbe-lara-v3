<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubdomainRequest extends FormRequest
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
            'url' => ['required', 'url:http,https', 'max:255'],
            'status' => ['required'],
            'op_teknis' => ['nullable', 'string', 'max:255'],
            'kontak_teknis' => ['nullable', 'digits_between:9,14', 'max:255'],
            'opd_pengelola' => ['required', 'max:255'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
