<?php

namespace Database\Seeders;

use App\Models\Katserver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatserverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Katserver::factory()->count(10)->create();
    }
}
