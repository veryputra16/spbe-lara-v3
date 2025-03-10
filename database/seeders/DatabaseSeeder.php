<?php

namespace Database\Seeders;

use App\Models\Frameworkapp;
use App\Models\Katserver;
use App\Models\Opd;
use App\Models\Subdomain;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Katserver::factory(10)->create();
        Frameworkapp::factory(10)->create();
        Opd::factory(2)->create();
        Subdomain::factory(2)->create();
        // User::factory(1)->create();

        User::factory()->create([
            'name' => 'Kota Denpasar',
            'username' => 'superadmin',
            'password' => bcrypt('123456789'),
            'role' => 'superadmin',
            'status' => 1,
        ]);


        $this->call([
            LayananappSeeder::class,
            KatappSeeder::class,
            KatplatformSeeder::class,
            KatpenggunaSeeder::class,
            KatdbSeeder::class,
            BahasaprogramSeeder::class,
        ]);
    }
}
