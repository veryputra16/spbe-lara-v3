<?php

namespace Database\Seeders;

use App\Models\Sdmteknic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdmteknicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sdmteknic::factory()->count(4)->create();
    }
}
