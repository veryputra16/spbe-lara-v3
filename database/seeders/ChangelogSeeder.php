<?php

namespace Database\Seeders;

use App\Models\Changelog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChangelogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Changelog::factory()->count(3)->create();
    }
}
