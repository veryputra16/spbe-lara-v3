<?php

namespace Database\Seeders;

use App\Models\Katpengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatpenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Katpengguna::create(['kategori_pengguna' => 'Khusus']);
        Katpengguna::create(['kategori_pengguna' => 'Umum']);
    }
}
