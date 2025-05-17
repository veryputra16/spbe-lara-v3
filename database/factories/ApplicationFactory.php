<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_app' => $this->faker->words(3, true),
            'fungsi_app' => $this->faker->text(20),
            'url' => $this->faker->url(),
            'dasar_hukum' => fake()->randomElement(['aplikasi/dasar-hukums/QgrF3IKnU0iMpyC4FForEobe2gz4eht3OnGPtIgl.pdf']),
            'opd_id' => $this->faker->numberBetween(1, 2),
            'tahun_buat' => $this->faker->year(),
            'repositori' => $this->faker->url(),
            'aset_takberwujud' => $this->faker->numberBetween(0, 1),
            'no_regis_app' => $this->faker->isbn13(),
            'proses_bisnis' => $this->faker->words(3, true),
            'ket_probis' => $this->faker->sentence(),
            'katpengguna_id' => $this->faker->numberBetween(1, 2),
            'katserver_id' => $this->faker->numberBetween(1, 2),
            'layananapp_id' => $this->faker->numberBetween(1, 2),
            'katapp_id' => $this->faker->numberBetween(1, 2),
            'jaringan_intra' => $this->faker->numberBetween(1, 2),
            'status' => $this->faker->numberBetween(0, 1),
            'alasan_nonaktif' => $this->faker->sentence(),
            'user_id' => $this->faker->numberBetween(1, 2),
            // 'fitur_app' => $this->faker->text(20),
            // 'buku_manual' => $this->faker->text(50),
            // 'katplatform_id' => $this->faker->numberBetween(1, 2),
            // 'bahasaprogram_id' => $this->faker->numberBetween(1, 2),
            // 'katdb_id' => $this->faker->numberBetween(1, 2),
            // 'frameworkapp_id' => $this->faker->numberBetween(1, 2),
            // 'nda' => $this->faker->text(50),
            // 'sop' => $this->faker->text(50),
            // 'dokumen_perancangan' => $this->faker->text(50),
            // 'capture_frontend' => $this->faker->text(50),
            // 'capture_backend' => $this->faker->text(50),
            // 'surat_mohon' => $this->faker->text(50),
            // 'kak' => $this->faker->text(50),
            // 'implemen_app' => $this->faker->text(50),
            // 'lapor_pentest' => $this->faker->text(50),
            // 'video_pengguna' => $this->faker->url(),
        ];
    }
}
