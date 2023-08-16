<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Package;
use App\Models\Residence;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** Create Package Seeder */
        $package = new Package();
        $package->name = 'Basic';
        $package->cost_per_month = 50000;
        $package->cost_per_year = 500000;
        $package->staff_limit_per_month = 3;
        $package->user_limit_per_month = 10;
        $package->wallet_amount_limit_per_month = 500000;
        $package->live_chat_per_month = 0;
        $package->support_ticket_per_month = 0;
        $package->online_payment_per_month = 0;
        $package->staff_limit_per_year = 6;
        $package->user_limit_per_year = 20;
        $package->wallet_amount_limit_per_year = 1000000;
        $package->live_chat_per_year = 0;
        $package->support_ticket_per_year = 0;
        $package->online_payment_per_year = 0;
        $package->status = 1;
        $package->save();

        /** Create Residence Seeder */
        $residence = new Residence();
        $residence->name = 'Puri Harmoni 6';
        $residence->slug = Str::slug('Puri Harmoni 6');
        $residence->province_code = '32';
        $residence->city_code = '3201';
        $residence->district_code = '320107';
        $residence->village_code = '3201072009';
        $residence->address = 'Puri Harmoni 6, Ds. Situsari, Kec. Cileungsi, Kab. Bogor, Jawa Barat';
        $residence->status = 1;
        $residence->save();

        /** Create Area Seeder */
        $area = new Area();
        $area->name = 'RT 005 RW 011 PH6';
        $area->slug = Str::slug('RT 005 RW 011 PH6');
        $area->residence_id = $residence->id;
        $area->rt = '005';
        $area->rw = '011';
        $area->province_code = $residence->province_code;
        $area->city_code = $residence->city_code;
        $area->district_code = $residence->district_code;
        $area->village_code = $residence->village_code;
        $area->postal_code = '16820';
        $area->full_address = 'Cileungsi - Bogor';
        $area->package_id = $package->id;
        $area->package_type = 'yearly';
        $area->membership_type = 'trial';
        $area->register_date = date_create('now')->format('Y-m-d');
        $area->valid_to_date = date('Y-m-d', strtotime('+30 days', strtotime(date_create('now')->format('Y-m-d'))));
        $area->cost = $package->cost_per_year;
        $area->staff_limit = $package->staff_limit_per_year;
        $area->user_limit = $package->user_limit_per_year;
        $area->wallet_amount_limit = $package->wallet_amount_limit_per_year;
        $area->live_chat = $package->live_chat_per_year;
        $area->support_ticket = $package->support_ticket_per_year;
        $area->online_payment = $package->online_payment_per_year;
        $area->status = 1;
        $area->save();

        /** Create Role & Permission Admin Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Admin Permission
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
        // Create Admin Role
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        // Create Super Admin User
        $admin = Admin::create([
            'name' => 'Super Admin User',
            'slug' => Str::slug('Super Admin User'),
            'email' => 'superadminuser@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        // Assign Role to Super Admin User
        $admin->assignRole($role);
        /** Role & Permission Admin Seeder - End */

        /** Create Role & Permission Member Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Member Permission
        $permissions = [
            ['guard_name' => 'member', 'name' => 'area index', 'group_name' => 'Area Permission'],
            ['guard_name' => 'member', 'name' => 'area create', 'group_name' => 'Area Permission'],
            ['guard_name' => 'member', 'name' => 'area update', 'group_name' => 'Area Permission'],
            ['guard_name' => 'member', 'name' => 'staff index', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff create', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff update', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'member', 'name' => 'staff non aktif', 'group_name' => 'Staff Permission'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        // Create Member Admin User
        $member = Member::create([
            'name' => 'Admin RT 005 RW 011 PH6',
            'slug' => Str::slug('Admin RT 005 RW 011 PH6'),
            'email' => 'adminrt5rw11ph6@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area->id,
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        // Create Member Role
        $role = Role::create(['guard_name' => 'member', 'name' => 'Admin', 'area_id' => $area->id]);
        // Assign Permission to Member Role
        $role->givePermissionTo([
            'area index',
            'area create',
            'area update',
            'staff index',
            'staff create',
            'staff update',
            'staff non aktif',
        ]);
        // Assign Role to Member Admin User
        $member->assignRole($role);
        /** Create Role & Permission Member Seeder - End */

        /** Create Role & Permission User Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create User Permission
        $permissions = [
            ['guard_name' => 'web', 'name' => 'warga index', 'group_name' => 'Warga Permission'],
            ['guard_name' => 'web', 'name' => 'warga create', 'group_name' => 'Warga Permission'],
            ['guard_name' => 'web', 'name' => 'warga update', 'group_name' => 'Warga Permission'],
            ['guard_name' => 'web', 'name' => 'warga non aktif', 'group_name' => 'Warga Permission'],
            ['guard_name' => 'web', 'name' => 'tagihan index', 'group_name' => 'Tagihan Permission'],
            ['guard_name' => 'web', 'name' => 'tagihan create', 'group_name' => 'Tagihan Permission'],
            ['guard_name' => 'web', 'name' => 'tagihan update', 'group_name' => 'Tagihan Permission'],
            ['guard_name' => 'web', 'name' => 'tagihan delete', 'group_name' => 'Tagihan Permission'],
            ['guard_name' => 'web', 'name' => 'pemasukan index', 'group_name' => 'Pemasukan Permission'],
            ['guard_name' => 'web', 'name' => 'pemasukan create', 'group_name' => 'Pemasukan Permission'],
            ['guard_name' => 'web', 'name' => 'pemasukan update', 'group_name' => 'Pemasukan Permission'],
            ['guard_name' => 'web', 'name' => 'pemasukan delete', 'group_name' => 'Pemasukan Permission'],
            ['guard_name' => 'web', 'name' => 'pengeluaran index', 'group_name' => 'Pengeluaran Permission'],
            ['guard_name' => 'web', 'name' => 'pengeluaran create', 'group_name' => 'Pengeluaran Permission'],
            ['guard_name' => 'web', 'name' => 'pengeluaran update', 'group_name' => 'Pengeluaran Permission'],
            ['guard_name' => 'web', 'name' => 'pengeluaran delete', 'group_name' => 'Pengeluaran Permission'],
            ['guard_name' => 'web', 'name' => 'approve pengeluaran', 'group_name' => 'Pengeluaran Permission'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $roleKetua = Role::create(['guard_name' => 'web', 'name' => 'Ketua', 'area_id' => $area->id]);
        $roleKetua->givePermissionTo([
            'warga index',
            'pemasukan index',
            'pengeluaran index',
            'approve pengeluaran',
        ]);
        $userKetua = User::factory()->create([
            'name' => 'Ketua',
            'slug' => Str::slug('ketua'),
            'image' => config('common.default_image_circle'),
            'email' => 'ketua@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => 'web', 'name' => 'Bendahara', 'area_id' => $area->id]);
        $roleBendahara->givePermissionTo([
            'tagihan index',
            'tagihan create',
            'tagihan update',
            'tagihan delete',
            'pemasukan index',
            'pemasukan create',
            'pemasukan update',
            'pemasukan delete',
            'pengeluaran index',
            'pengeluaran create',
            'pengeluaran update',
            'pengeluaran delete',
        ]);
        $userBendahara = User::factory()->create([
            'name' => 'Bendahara',
            'slug' => Str::slug('bendahara'),
            'image' => config('common.default_image_circle'),
            'email' => 'bendahara@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => 'web', 'name' => 'Sekretaris', 'area_id' => $area->id]);
        $roleSekretaris->givePermissionTo([
            'warga index',
            'warga create',
            'warga update',
            'warga non aktif',
        ]);
        $userSekretaris = User::factory()->create([
            'name' => 'Sekretaris',
            'slug' => Str::slug('sekretaris'),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretaris@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
        ]);
        $userSekretaris->assignRole($roleSekretaris);
        /** Create Role & Permission User Seeder - End */
    }
}
