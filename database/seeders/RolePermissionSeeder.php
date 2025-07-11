<?php

namespace Database\Seeders;

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
        $addApplication = Permission::create(['name' => 'add-aplikasi']);
        $updateApplication = Permission::create(['name' => 'edit-aplikasi']);
        $deleteApplication = Permission::create(['name' => 'delete-aplikasi']);
        $viewApplication = Permission::create(['name' => 'view-aplikasi']);

        $addPortal = Permission::create(['name' => 'add-Portal']);
        $updatePortal = Permission::create(['name' => 'edit-Portal']);
        $deletePortal = Permission::create(['name' => 'delete-Portal']);

        $addAppDesa = Permission::create(['name' => 'add-aplikasi-desa']);
        $updateAppDesa = Permission::create(['name' => 'edit-aplikasi-desa']);
        $deleteAppDesa = Permission::create(['name' => 'delete-aplikasi-desa']);
        $viewAppDesa = Permission::create(['name' => 'view-aplikasi-desa']);

        $addAppLain = Permission::create(['name' => 'add-aplikasi-lain']);
        $updateAppLain = Permission::create(['name' => 'edit-aplikasi-lain']);
        $deleteAppLain = Permission::create(['name' => 'delete-aplikasi-lain']);
        $viewAppLain = Permission::create(['name' => 'view-aplikasi-lain']);

        // menghubungkan role dengan permission
        $superadmin->syncPermissions($addApplication, $updateApplication, $deleteApplication, $viewApplication, $addPortal, $updatePortal, $deletePortal, $addAppDesa, $updateAppDesa, $deleteAppDesa, $viewAppDesa, $addAppLain, $updateAppLain, $deleteAppLain, $viewAppLain);

        $adminapp->syncPermissions($addApplication, $updateApplication, $deleteApplication, $viewApplication, $addPortal, $updatePortal, $deletePortal, $addAppDesa, $updateAppDesa, $deleteAppDesa, $viewAppDesa, $addAppLain, $updateAppLain, $deleteAppLain, $viewAppLain);

        $opapp->syncPermissions($addApplication, $updateApplication, $viewApplication, $updatePortal, $addAppDesa, $updateAppDesa, $viewAppDesa, $addAppLain, $updateAppLain, $viewAppLain);

        $guestApp->syncPermissions($viewApplication, $viewAppDesa, $viewAppLain);

        // membuat user superadmin default
        $userSuperadmin = User::create([
            'name' => 'Kota Denpasar',
            'username' => 'matadewa',
            'password' => bcrypt('123456789'),
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

        // membuat user operator aplikasi default
        $userOpApp = User::create([
            'name' => 'Okky Maheswara',
            'username' => 'putuokky',
            'password' => bcrypt('kominfo2021'),
        ]);
        $userOpApp->assignRole($opapp);
    }
}
