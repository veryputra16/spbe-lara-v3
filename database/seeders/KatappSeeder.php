<?php

namespace Database\Seeders;

use App\Models\Katapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Katapp::create(['kategori_aplikasi' => 'Pusat']);
        Katapp::create(['kategori_aplikasi' => 'Lokal']);
    }
}
