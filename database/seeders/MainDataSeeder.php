<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Package;
use App\Models\Residence;
use Illuminate\Support\Str;
use App\Models\SettingMember;
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

        $residence = new Residence();
        $residence->name = 'Puri Hesti Insani';
        $residence->slug = Str::slug('Puri Hesti Insani');
        $residence->province_code = '32';
        $residence->city_code = '3201';
        $residence->district_code = '320107';
        $residence->village_code = '3201072009';
        $residence->address = 'Puri Harmoni 6, Ds. Situsari, Kec. Cileungsi, Kab. Bogor, Jawa Barat';
        $residence->status = 1;
        $residence->save();

        /** Create Area Seeder */
        $area = new Area();
        $area->name = 'Super Admin Area';
        $area->slug = Str::slug('Super Admin Area');
        $area->save();

        /** Create Role & Permission Admin Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Admin Permission
        $permissions = getArraySuperAdminPermission();
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        // Create Admin Role
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin', 'area_id' => $area->id]);
        // Create Super Admin User
        $admin = Admin::create([
            'name' => 'Super Admin User',
            'slug' => Str::slug('Super Admin User'),
            'email' => 'superadminuser@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area->id,
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);
        // Assign Role to Super Admin User
        $admin->assignRole($role);
        /** Role & Permission Admin Seeder - End */

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

        /** Create Role & Permission Member Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create Member Permission
        $permissions = getArrayMemberAdminPermission();
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
        $role = Role::create(['guard_name' => 'member', 'name' => getGuardTextAdmin(), 'area_id' => $area->id]);
        // Assign Permission to Member Role
        $role->givePermissionTo(setArrayMemberAdminPermission());
        // Assign Role to Member Admin User
        $member->assignRole($role);
        /** Create Role & Permission Member Seeder - End */

        /** Create Role & Permission User Seeder - Begin */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // Create User Permission
        $permissions = getArrayUserAllPermission();;
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $roleKetua = Role::create(['guard_name' => 'web', 'name' => 'Ketua', 'area_id' => $area->id]);
        $roleKetua->givePermissionTo(setArrayKetuaPermission());
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
        $roleBendahara->givePermissionTo(setArrayBendaharaPermission());
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
        $roleSekretaris->givePermissionTo(setArraySekretarisPermission());
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

        $input = [
            ['key' => 'default_language', 'value' => 'en', 'area_id' => $area->id],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }
    }
}
