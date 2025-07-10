<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subdomain>
 */
class SubdomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->url(),
            'op_teknis' => fake()->name(),
            'kontak_teknis' => fake()->randomNumber(7),
            'opd_id' => $this->faker->numberBetween(1, 2),
            'keterangan' => $this->faker->word(),
        ];
    }
}
