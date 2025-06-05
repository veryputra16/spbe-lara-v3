<?php

namespace Database\Seeders;

use App\Models\Pengembangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengembanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengembangan::factory()->count(10)->create();
    }
}
