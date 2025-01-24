<?php

namespace Database\Seeders;

use App\Models\Katplatform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KatplatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Katplatform::create(['kategori_platform' => 'Website']);
        Katplatform::create(['kategori_platform' => 'Mobile']);
        Katplatform::create(['kategori_platform' => 'Dekstop']);
        Katplatform::create(['kategori_platform' => 'Lainnya']);
    }
}
