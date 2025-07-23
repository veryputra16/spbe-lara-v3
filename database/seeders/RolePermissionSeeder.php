<?php

namespace Database\Seeders;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat role
        $superadmin = Role::create(['name' => 'superadmin']);
        $adminspbe = Role::create(['name' => 'admin-spbe']);
        $adminapp = Role::create(['name' => 'admin-aplikasi']);
        $opapp = Role::create(['name' => 'operator-aplikasi']);
        $opspbe = Role::create(['name' => 'operator-spbe']);
        $ekse = Role::create(['name' => 'eksekutif']); // fitur evaluasi SPBE]);
        $guestApp = Role::create(['name' => 'viewer-aplikasi']);
        $guestall = Role::create(['name' => 'viewer-all']); // fitur penilaian SPBE dan data aplikasi , portal cms dll]);

        // membuat permission
        $permissions = [
            // for modul aplikasi
            'add-aplikasi',
            'edit-aplikasi',
            'delete-aplikasi',
            'view-aplikasi',
            // for modul pengembangan aplikasi
            'add-pengembangan',
            'edit-pengembangan',
            'delete-pengembangan',
            'view-pengembangan',
            // for modul integrasi aplikasi
            'add-integrasi',
            'edit-integrasi',
            'delete-integrasi',
            'view-integrasi',
            // for modul sdm teknis aplikasi
            'add-sdmteknis',
            'edit-sdmteknis',
            'delete-sdmteknis',
            // for modul keamanan aplikasi
            'add-keamanan',
            'edit-keamanan',
            'delete-keamanan',
            // for modul data aplikasi
            'add-data',
            'edit-data',
            'delete-data',
            // for modul portal cms
            'add-portal',
            'edit-portal',
            'delete-portal',
            // for modul aplikasi desa
            'add-aplikasi-desa',
            'edit-aplikasi-desa',
            'delete-aplikasi-desa',
            'view-aplikasi-desa',
            // for modul aplikasi lainnya
            'add-aplikasi-lain',
            'edit-aplikasi-lain',
            'delete-aplikasi-lain',
            'view-aplikasi-lain',
            // for modul monev aplikasi
            'add-monev-aplikasi',
            'edit-monev-aplikasi',
            'delete-monev-aplikasi',
            'view-monev-aplikasi',
        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // membuat user superadmin default
        $userSuperadmin = User::create([
            'name' => 'Kota Denpasar',
            'username' => 'matadewa',
            'password' => bcrypt('123456789'),
        ]);
        $userSuperadmin->assignRole($superadmin);
        $userSuperadmin->syncPermissions($permissions);

        // membuat user admin aplikasi default
        $userAdminApps = User::create([
            'name' => 'Admin Aplikasi',
            'username' => 'adminapps',
            'password' => bcrypt('Kominfo2021'),
        ]);
        $userAdminApps->assignRole($adminapp);

        // membuat user admin spbe default
        $userAdminSPBE = User::create([
            'name' => 'Admin SPBE',
            'username' => 'adminspbe',
            'password' => bcrypt('Kominfo2021'),
        ]);
        $userAdminSPBE->assignRole($adminspbe);

        // membuat user operator aplikasi default
        $userOpApp = User::create([
            'name' => 'Operator Aplikasi',
            'username' => 'operatorapps',
            'password' => bcrypt('Kominfo2021'),
        ]);
        $userOpApp->assignRole($opapp);

        // membuat user operator aplikasi default
        $userViewApp = User::create([
            'name' => 'Viewer Aplikasi',
            'username' => 'viewerapps',
            'password' => bcrypt('Kominfo2021'),
        ]);
        $userViewApp->assignRole($guestApp);
    }
}
