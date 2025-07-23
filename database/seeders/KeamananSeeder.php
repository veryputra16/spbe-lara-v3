<?php

namespace Database\Seeders;

use App\Models\Keamanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeamananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Keamanan::factory()->count(6)->create();
    }
}
