<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LayananappSeeder::class,
            KatappSeeder::class,
            KatplatformSeeder::class,
            KatpenggunaSeeder::class,
            KatdbSeeder::class,
            BahasaprogramSeeder::class,
            KatserverSeeder::class,
            FrameworkappSeeder::class,
            RolePermissionSeeder::class,
            OpdSeeder::class,
            ApplicationSeeder::class,
            SubdomainSeeder::class,
            FaqSeeder::class,
            ChangelogSeeder::class,
            SdmteknicSeeder::class,
            InteropSeeder::class,
            PengembanganSeeder::class,
            KeamananSeeder::class,
            DataSeeder::class,
            SdmpengembangSeeder::class,
            MonevappSeeder::class,
        ]);
    }
}
