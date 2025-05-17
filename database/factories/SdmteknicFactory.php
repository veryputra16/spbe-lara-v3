<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sdmteknic>
 */
class SdmteknicFactory extends Factory
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
            'nama_tenaga_technic' => fake()->name(),
            'nip_jabatan_tenaga_technic' => $this->faker->numerify('19#############0##'),
            'jabatan_tenaga_technic' => fake()->sentence(),
            'nohp_tenaga_technic' => fake()->phoneNumber(),
            'email_tenaga_technic' => fake()->email(),
            'status_tenaga_technic' => fake()->randomElement(['teknis', 'pejabat']),
        ];
    }
}
