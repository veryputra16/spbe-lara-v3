<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeamananRequest extends FormRequest
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
            'menerapkan_manajemen_katasandi' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_metode_hashing' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_enkripsi_data' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_ssl' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_captcha_login' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_token_api' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_manajemen_sesi' => ['required', 'integer', 'min:0', 'max:1'],
            'notif_user_login_bersama' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_fitur_log' => ['required', 'integer', 'min:0', 'max:1'],
            'menerapkan_size_file' => ['required', 'integer', 'min:0', 'max:1'],
            'pernah_mengalami_serangan_cyber' => ['required', 'integer', 'min:0', 'max:1'],
            'penanganan_serangan_cyber' => ['nullable', 'file', 'mimes:pdf', 'max:10000'],
            'pernah_audit_keamanan' => ['required', 'string', 'in:pernah,belum'],
            'siapa_melakukan_audit_keamanan' => ['required', 'string', 'in:mandiri,dinas-kominfos,pihak-lainnya,belum-dilaksanakan-audit'],
            'user_id' => ['required'],
        ];
    }
}
