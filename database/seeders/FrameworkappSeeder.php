<?php

namespace Database\Seeders;

use App\Models\Frameworkapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameworkappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Frameworkapp::factory()->count(10)->create();
    }
}
