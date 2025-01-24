<?php

namespace Database\Seeders;

use App\Models\Bahasaprogram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahasaprogramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Bahasaprogram::create(['bhs_program' => 'PHP 5']);
        Bahasaprogram::create(['bhs_program' => 'PHP 7']);
        Bahasaprogram::create(['bhs_program' => 'PHP 8']);
        Bahasaprogram::create(['bhs_program' => 'Dart']);
    }
}
