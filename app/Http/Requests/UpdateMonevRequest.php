<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMonevRequest extends FormRequest
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
            'tgl_monev' => ['required', 'date'],
            'bukti_monev' => ['sometimes', 'file', 'mimes:pdf', 'max:10000'],
            'ket_monev' => ['nullable', 'text'],
            'user_id' => ['required'],
        ];
    }
}
