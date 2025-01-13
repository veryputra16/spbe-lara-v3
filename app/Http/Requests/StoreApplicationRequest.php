<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'uraian_app' => ['required', 'string', 'max:255'],
            'fungsi_app' => ['required', 'string', 'max:255'],
            'infografis' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'status' => ['required', 'boolean'],
            'tahun_buat' => ['required', 'integer'],
            'buku_manual' => ['sometimes', 'file', 'mimes:pdf'],
            'repositori' => ['sometimes', 'string', 'max:255'],
            'alasan_nonaktif' => ['sometimes', 'string', 'max:255'],
            'nda' => ['sometimes', 'file', 'mimes:pdf'],
            'aset_takberwujud' => ['required', 'boolean'],
            'sop' => ['sometimes', 'file', 'mimes:pdf'],
            'jaringan_intra' => ['required', 'string', 'max:255'],
            'dokumen_perancangan' => ['sometimes', 'file', 'mimes:pdf'],
        ];
    }
}
