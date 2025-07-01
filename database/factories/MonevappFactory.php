<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monevapp>
 */
class MonevappFactory extends Factory
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
            'pengembangan_id' => $this->faker->numberBetween(1, 8),
            'tgl_monev' => fake()->date(),
            'bukti_monev' => fake()->randomElement(['aplikasi/bukti-monevs/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'ket_monev' => fake()->sentence(),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
