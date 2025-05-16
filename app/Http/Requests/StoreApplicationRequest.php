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
            'nama_app' => ['required', 'string', 'max:255'],
            'fungsi_app' => ['required'],
            'url' => ['nullable', 'url:http,https'],
            'dasar_hukum' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'opd_id' => ['required'],
            'tahun_buat' => ['required', 'date_format:Y'],
            'repositori' => ['nullable', 'url:http,https'],
            'aset_takberwujud' => ['required', 'boolean'],
            // 'no_regis_app' => ['required'],
            'proses_bisnis' => ['nullable', 'string', 'max:255'],
            'ket_probis' => ['nullable', 'string'],
            'katpengguna_id' => ['required'],
            'katserver_id' => ['required'],
            'layananapp_id' => ['required'],
            'katapp_id' => ['required'],
            'jaringan_intra' => ['required'],
            'status' => ['required'],
            'alasan_nonaktif' => ['nullable', 'string'],
            'user_id' => ['required'],
        ];
    }
}
