<?php

namespace Database\Seeders;

use App\Models\Layananapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Layananapp::create(['layanan_app' => 'Publik']);
        Layananapp::create(['layanan_app' => 'Administrasi Pemerintah']);
    }
}
