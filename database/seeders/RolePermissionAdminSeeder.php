<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            ['guard_name' => 'admin', 'name' => 'package index', 'group_name' => 'Package Permission'],
            ['guard_name' => 'admin', 'name' => 'package create', 'group_name' => 'Package Permission'],
            ['guard_name' => 'admin', 'name' => 'package update', 'group_name' => 'Package Permission'],
            ['guard_name' => 'admin', 'name' => 'package non aktif', 'group_name' => 'Package Permission'],
            ['guard_name' => 'admin', 'name' => 'permission index', 'group_name' => 'Permission Permission'],
            ['guard_name' => 'admin', 'name' => 'permission create', 'group_name' => 'Permission Permission'],
            ['guard_name' => 'admin', 'name' => 'permission update', 'group_name' => 'Permission Permission'],
            ['guard_name' => 'admin', 'name' => 'permission delete', 'group_name' => 'Permission Permission'],
            ['guard_name' => 'admin', 'name' => 'role index', 'group_name' => 'Role Permission'],
            ['guard_name' => 'admin', 'name' => 'role create', 'group_name' => 'Role Permission'],
            ['guard_name' => 'admin', 'name' => 'role update', 'group_name' => 'Role Permission'],
            ['guard_name' => 'admin', 'name' => 'role delete', 'group_name' => 'Role Permission'],
            ['guard_name' => 'admin', 'name' => 'admin index', 'group_name' => 'Admin Permission'],
            ['guard_name' => 'admin', 'name' => 'admin create', 'group_name' => 'Admin Permission'],
            ['guard_name' => 'admin', 'name' => 'admin update', 'group_name' => 'Admin Permission'],
            ['guard_name' => 'admin', 'name' => 'admin non aktif', 'group_name' => 'Admin Permission'],
            ['guard_name' => 'admin', 'name' => 'member index', 'group_name' => 'Member Permission'],
            ['guard_name' => 'admin', 'name' => 'member create', 'group_name' => 'Member Permission'],
            ['guard_name' => 'admin', 'name' => 'member update', 'group_name' => 'Member Permission'],
            ['guard_name' => 'admin', 'name' => 'member non aktif', 'group_name' => 'Member Permission'],
            ['guard_name' => 'admin', 'name' => 'language index', 'group_name' => 'Language Permission'],
            ['guard_name' => 'admin', 'name' => 'language create', 'group_name' => 'Language Permission'],
            ['guard_name' => 'admin', 'name' => 'language update', 'group_name' => 'Language Permission'],
            ['guard_name' => 'admin', 'name' => 'language non aktif', 'group_name' => 'Language Permission'],
            ['guard_name' => 'admin', 'name' => 'website language index', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'website language create', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'website language update', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'website language delete', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'system language index', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'system language create', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'system language update', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'system language delete', 'group_name' => 'Website Language Permission'],
            ['guard_name' => 'admin', 'name' => 'offline payment index', 'group_name' => 'Offline Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'offline payment create', 'group_name' => 'Offline Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'offline payment update', 'group_name' => 'Offline Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'offline payment delete', 'group_name' => 'Offline Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'online payment index', 'group_name' => 'Online Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'online payment update', 'group_name' => 'Online Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'online payment delete', 'group_name' => 'Online Payment Permission'],
            ['guard_name' => 'admin', 'name' => 'support ticket index', 'group_name' => 'Support Ticket Permission'],
            ['guard_name' => 'admin', 'name' => 'support ticket update', 'group_name' => 'Support Ticket Permission'],
            ['guard_name' => 'admin', 'name' => 'support ticket delete', 'group_name' => 'Support Ticket Permission'],
            ['guard_name' => 'admin', 'name' => 'website setting index', 'group_name' => 'Website Setting Permission'],
            ['guard_name' => 'admin', 'name' => 'website setting update', 'group_name' => 'Website Setting Permission'],
            ['guard_name' => 'admin', 'name' => 'system setting index', 'group_name' => 'System Setting Permission'],
            ['guard_name' => 'admin', 'name' => 'system setting update', 'group_name' => 'System Setting Permission'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);

        $admin = Admin::create([
            'name' => 'Super Admin User',
            'slug' => Str::slug('Super Admin User'),
            'email' => 'superadminuser@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => '/images/no_image_circle.png',
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole($role);
    }
}
