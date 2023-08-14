<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Member;
use App\Models\Package;
use App\Models\Residence;
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

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

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

        $member = Member::create([
            'name' => 'Admin RT 005 RW 011 PH6',
            'slug' => Str::slug('Admin RT 005 RW 011 PH6'),
            'email' => 'adminrt5rw11ph6@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => '/images/no_image_circle.png',
            'area_id' => $area->id,
            'status' => 1,
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['guard_name' => 'member', 'name' => 'Admin', 'member_id' => $member->id]);
        $role->givePermissionTo([
            'area index',
            'area create',
            'area update',
            'staff index',
            'staff create',
            'staff update',
            'staff non aktif',
        ]);

        $member->assignRole($role);
    }
}
