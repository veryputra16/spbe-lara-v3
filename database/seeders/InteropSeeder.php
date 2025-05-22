<?php

namespace Database\Seeders;

use App\Models\Interop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InteropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interop::factory()->count(4)->create();
    }
}
