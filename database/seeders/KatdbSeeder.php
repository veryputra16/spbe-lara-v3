<?php

namespace Database\Seeders;

use App\Models\Katdb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatdbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Katdb::create(['kategori_database' => 'MySQL']);
        Katdb::create(['kategori_database' => 'Oracle']);
        Katdb::create(['kategori_database' => 'Microsoft SQL Server']);
        Katdb::create(['kategori_database' => 'PostgreSQL']);
    }
}
