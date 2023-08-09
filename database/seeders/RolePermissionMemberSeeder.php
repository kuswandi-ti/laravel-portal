<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            ['guard_name' => 'member', 'name' => 'residence index', 'group_name' => 'Residence Permission'],
            ['guard_name' => 'member', 'name' => 'residence create', 'group_name' => 'Residence Permission'],
            ['guard_name' => 'member', 'name' => 'residence update', 'group_name' => 'Residence Permission'],
            ['guard_name' => 'member', 'name' => 'staff index', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff create', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff update', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff non aktif', 'group_name' => 'Staff Permission'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $role = Role::create(['guard_name' => 'member', 'name' => 'Admin']);
        $role->givePermissionTo([
            'residence index',
            'residence create',
            'residence update',
            'staff index',
            'staff create',
            'staff update',
            'staff non aktif',
        ]);
        $member = Member::create([
            'name' => 'Member Admin User',
            'slug' => Str::slug('Member Admin User'),
            'email' => 'memberadminuser@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => '/images/no_image_circle.png',
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        $member->assignRole($role);
    }
}
