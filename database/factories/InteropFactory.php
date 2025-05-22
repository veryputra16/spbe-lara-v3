<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interop>
 */
class InteropFactory extends Factory
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
            'doc_interop' => fake()->randomElement(['aplikasi/doc-interops/gbpLoV5uw5SehevUJTBdRBLYnVCdNj11PhTOmxRX.pdf']),
            'ket_interop' => $this->faker->text(50),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
