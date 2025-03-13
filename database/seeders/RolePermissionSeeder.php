<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat role
        $superadmin = Role::create([
            'name' => 'superadmin'
        ]);
        $adminspbe = Role::create([
            'name' => 'admin-spbe'
        ]);
        $adminapp = Role::create([
            'name' => 'admin-aplikasi'
        ]);
        $opspbe = Role::create([
            'name' => 'operator-spbe'
        ]);
        $opapp = Role::create([
            'name' => 'operator-aplikasi'
        ]);
        $ekse = Role::create([
            'name' => 'eksekutif' // fitur evaluasi SPBE
        ]);
        $ekseplus = Role::create([
            'name' => 'eksekutif-plus' // fitur penilaian SPBE dan data aplikasi , portal cms
        ]);
        $guest = Role::create([
            'name' => 'viewer'
        ]);

        // membuat user default
        $userSuperadmin = User::create([
            'name' => 'Kota Denpasar',
            'username' => 'superadmin',
            'password' => bcrypt('123456789'),
        ]);

        $userSuperadmin->assignRole($superadmin);
    }
}
