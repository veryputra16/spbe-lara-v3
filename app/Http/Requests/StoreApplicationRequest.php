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
            'uraian_app' => ['required', 'string'],
            'fungsi_app' => ['required', 'string'],
            'link' => ['sometimes', 'string'],
            'capture_frontend' => ['required', 'string'],
            'capture_backend' => ['required', 'string'],
            'status' => ['required', 'boolean'],
            'tahun_buat' => ['required', 'integer'],
            'buku_manual' => ['sometimes', 'file', 'mimes:pdf', 'size:100000'],
            'repositori' => ['sometimes', 'string'],
            'alasan_nonaktif' => ['sometimes', 'string'],
            'nda' => ['sometimes', 'file', 'mimes:pdf', 'size:100000'],
            'aset_takberwujud' => ['required', 'boolean'],
            'sop' => ['sometimes', 'file', 'mimes:pdf', 'size:100000'],
            'jaringan_intra' => ['required', 'boolean'],
            'dokumen_perancangan' => ['sometimes', 'file', 'mimes:pdf', 'size:100000'],
            'katpengguna_id' => ['required'],
            'katapp_id' => ['required'],
            'dasar_hukum' => ['sometimes', 'file', 'mimes:pdf', 'size:100000'],
            'katplatform_id' => ['required'],
            'opd_pengelola' => ['required'],
            'app_sudah_terintegrasi' => ['sometimes', 'string', 'max:255'],
            'jelaskan_app_sudah_terintegrasi_apa_saja' => ['sometimes', 'string'],
            'bahasaprogram_id' => ['required'],
            'katdb_id' => ['required'],
            'katserver_id' => ['required'],
            'layananapp_id' => ['required'],
            'frameworkapp_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
