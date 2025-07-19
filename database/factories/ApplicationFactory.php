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
            'opd_id' => $this->faker->numberBetween(1, 65),
            'tahun_buat' => $this->faker->year(),
            'repositori' => $this->faker->url(),
            'aset_takberwujud' => $this->faker->numberBetween(0, 1),
            'no_regis_app' => $this->faker->isbn13(),
            'proses_bisnis' => $this->faker->words(3, true),
            'ket_probis' => $this->faker->sentence(),
            'katpengguna_id' => $this->faker->numberBetween(1, 2),
            'katserver_id' => $this->faker->numberBetween(1, 2),
            'layananapp_id' => $this->faker->numberBetween(1, 2),
            'katapp_id' => $this->faker->numberBetween(1, 4),
            'jaringan_intra' => $this->faker->numberBetween(1, 2),
            'status' => $this->faker->numberBetween(0, 1),
            'alasan_nonaktif' => $this->faker->sentence(),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
