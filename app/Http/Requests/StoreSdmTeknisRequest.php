<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSdmTeknisRequest extends FormRequest
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
            'application_id' => ['required'],
            'nama_tenaga_technic' => ['required', 'string', 'max:255'],
            'nip_jabatan_tenaga_technic' => ['nullable', 'numeric', 'min:18'],
            'jabatan_tenaga_technic' => ['required', 'string', 'max:255'],
            'nohp_tenaga_technic' => ['required', 'numeric', 'digits_between:10,13'],
            'email_tenaga_technic' => ['nullable', 'email', 'unique:users,email'],
            'status_tenaga_technic' => ['required'],
        ];
    }
}
