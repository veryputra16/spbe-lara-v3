<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengembangan>
 */
class PengembanganFactory extends Factory
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
            'tahun_pengembangan' => fake()->year(),
            'riwayat_pengembangan' => fake()->sentence(),
            'fitur' => fake()->sentence(),
            'nda' => fake()->randomElement(['pengembangan/ndas/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'doc_perancangan' => fake()->randomElement(['pengembangan/perancangans/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'surat_mohon' => fake()->randomElement(['pengembangan/ndas/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'kak' => fake()->randomElement(['pengembangan/kaks/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'sop' => fake()->randomElement(['pengembangan/sops/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'doc_pentest' => fake()->randomElement(['pengembangan/pentests/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'doc_uat' => fake()->randomElement(['pengembangan/uats/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'video_penggunaan' => fake()->url(),
            'buku_manual' => fake()->randomElement(['pengembangan/ndas/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'katplatform_id' => $this->faker->numberBetween(1, 4),
            'katdb_id' => $this->faker->numberBetween(1, 4),
            'bahasaprogram_id' => $this->faker->numberBetween(1, 4),
            'frameworkapp_id' => $this->faker->numberBetween(1, 8),
            'capture_frontend' => fake()->randomElement(['pengembangan/capture-frontends/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'capture_backend' => fake()->randomElement(['pengembangan/capture-backends/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
