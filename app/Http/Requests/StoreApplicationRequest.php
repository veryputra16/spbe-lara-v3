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
            'user_id' => ['required'],
            'opd_pengelola' => ['required'],
            'nama_app' => ['required', 'string', 'max:255'],
            'fitur_app' => ['required'],
            'fungsi_app' => ['required'],
            'url' => ['nullable', 'url:http,https'],
            'tahun_buat' => ['required', 'date_format:Y'],
            'repositori' => ['nullable', 'url:http,https'],
            'layananapp_id' => ['required'],
            'jaringan_intra' => ['required'],
            'status' => ['required', 'boolean'],
            'alasan_nonaktif' => ['nullable', 'string'],
            'katpengguna_id' => ['required'],
            'katapp_id' => ['required'],
            'katplatform_id' => ['required'],
            'katdb_id' => ['required'],
            'katserver_id' => ['required'],
            'bahasaprogram_id' => ['required'],
            'frameworkapp_id' => ['required'],
            'dasar_hukum' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'nda' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'sop' => ['required', 'file', 'mimes:pdf', 'max:100000'],
            'kak' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'capture_frontend' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10000'],
            'capture_backend' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:10000'],
            'buku_manual' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'dokumen_perancangan' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'surat_mohon' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'implemen_app' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'lapor_pentest' => ['nullable', 'file', 'mimes:pdf', 'max:100000'],
            'aset_takberwujud' => ['required', 'boolean'],
            'video_pengguna' => ['nullable', 'url:http,https'],
        ];
    }
}
