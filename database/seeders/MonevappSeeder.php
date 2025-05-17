<?php

namespace Database\Seeders;

use App\Models\Monevapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonevappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Monevapp::factory()->count(4)->create();
    }
}
