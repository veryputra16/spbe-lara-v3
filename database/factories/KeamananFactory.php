<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keamanan>
 */
class KeamananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'application_id' => $this->faker->numberBetween(1, 8),
            'menerapkan_manajemen_katasandi' => fake()->numberBetween(0, 1),
            'menerapkan_metode_hashing' => fake()->numberBetween(0, 1),
            'menerapkan_enkripsi_data' => fake()->numberBetween(0, 1),
            'menerapkan_ssl' => fake()->numberBetween(0, 1),
            'menerapkan_captcha_login' => fake()->numberBetween(0, 1),
            'menerapkan_token_api' => fake()->numberBetween(0, 1),
            'menerapkan_manajemen_sesi' => fake()->numberBetween(0, 1),
            'notif_user_login_bersama' => fake()->numberBetween(0, 1),
            'menerapkan_fitur_log' => fake()->numberBetween(0, 1),
            'menerapkan_size_file' => fake()->numberBetween(0, 1),
            'pernah_mengalami_serangan_cyber' => fake()->numberBetween(0, 1),
            'penanganan_serangan_cyber' => fake()->randomElement(['aplikasi/keamanan/penanganan-serangan-cybers/wdkXiHEGfZZV4MII87PO9OS0XEGl0JfU41rz2kJh.pdf']),
            'pernah_audit_keamanan' => fake()->randomElement(['belum', 'pernah']),
            'siapa_melakukan_audit_keamanan' => fake()->randomElement(['belum-dilaksanakan-audit', 'mandiri', 'dinas-kominfos', 'pihak-lainnya']),
            'bukti_dukung_audit_keamanan' => fake()->randomElement(['aplikasi/keamanan/buktidukung-audits/FUXzibcwZUbLHKGpKDu0ZMXL9MTmdfm79bjIZOBQ.pdf']),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
