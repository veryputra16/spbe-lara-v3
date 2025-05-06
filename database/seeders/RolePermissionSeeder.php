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
        $opapp = Role::create([
            'name' => 'operator-aplikasi'
        ]);
        $opspbe = Role::create([
            'name' => 'operator-spbe'
        ]);
        $ekse = Role::create([
            'name' => 'eksekutif' // fitur evaluasi SPBE
        ]);
        $ekseplus = Role::create([
            'name' => 'eksekutif-plus' // fitur penilaian SPBE dan data aplikasi , portal cms dll
        ]);
        $guest = Role::create([
            'name' => 'viewer'
        ]);

        // membuat user superadmin default
        $userSuperadmin = User::create([
            'name' => 'Kota Denpasar',
            'username' => 'matadewa',
            'password' => bcrypt('123456789'),
            // 'role' => 'superadmin',
        ]);
        $userSuperadmin->assignRole($superadmin);

        // membuat user admin aplikasi default
        $userAdminApps = User::create([
            'name' => 'Admin Aplikasi',
            'username' => 'adminapps',
            'password' => bcrypt('kominfo2021'),
        ]);
        $userAdminApps->assignRole($adminapp);

        // membuat user admin spbe default
        $userAdminSPBE = User::create([
            'name' => 'Admin SPBE',
            'username' => 'adminspbe',
            'password' => bcrypt('kominfo2021'),
        ]);
        $userAdminSPBE->assignRole($adminspbe);
    }
}
