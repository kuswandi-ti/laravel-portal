<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use App\Models\Admin;
use App\Models\Block;
use App\Models\House;
use App\Models\Member;
use App\Models\Street;
use App\Models\Account;
use App\Models\Package;
use App\Models\Residence;
use Illuminate\Support\Str;
use App\Models\SettingMember;
use App\Models\AccountCategory;
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
        $package->created_by = 'Super Admin';
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
        $residence->created_by = 'Super Admin';
        $residence->save();

        /** Create Area Seeder */
        $area = new Area();
        $area->name = 'Super Admin Area';
        $area->slug = Str::slug('Super Admin Area');
        $area->residence_id = $residence->id;
        $area->package_id = $package->id;
        $area->created_by = 'Super Admin';
        $area->save();

        $residence = new Residence();
        $residence->name = 'Puri Hesti Insani';
        $residence->slug = Str::slug('Puri Hesti Insani');
        $residence->province_code = '32';
        $residence->city_code = '3201';
        $residence->district_code = '320107';
        $residence->village_code = '3201072009';
        $residence->address = 'Puri Harmoni 6, Ds. Situsari, Kec. Cileungsi, Kab. Bogor, Jawa Barat';
        $residence->status = 1;
        $residence->created_by = 'Super Admin';
        $residence->save();

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
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
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
        $area->created_by = 'Super Admin';
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
            'created_by' => 'Super Admin',
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
        $permissions = getArrayUserAllPermission();
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        /** Create Street */
        $street1 = Street::create([
            'name' => 'Gg. Masjid I',
            'slug' => Str::slug('Gg. Masjid I'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street2 = Street::create([
            'name' => 'Gg. Masjid II',
            'slug' => Str::slug('Gg. Masjid II'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street3 = Street::create([
            'name' => 'Gg. Masjid III',
            'slug' => Str::slug('Gg. Masjid III'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street4 = Street::create([
            'name' => 'Gg. Masjid IV',
            'slug' => Str::slug('Gg. Masjid IV'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street5 = Street::create([
            'name' => 'Gg. Masjid V',
            'slug' => Str::slug('Gg. Masjid V'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        /** Create Street - End */

        /** Create Block */
        $block1 = Block::create([
            'name' => 'F1',
            'slug' => Str::slug('F1'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block2 = Block::create([
            'name' => 'F2',
            'slug' => Str::slug('F2'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block3 = Block::create([
            'name' => 'F3',
            'slug' => Str::slug('F3'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block4 = Block::create([
            'name' => 'F4',
            'slug' => Str::slug('F4'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block5 = Block::create([
            'name' => 'F5',
            'slug' => Str::slug('F5'),
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        /** Create Block - End */

        /** Create House */
        $house1 = House::create([
            'owner_name' => 'Nana Suherna',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '14',
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house2 = House::create([
            'owner_name' => 'Jajang',
            'street' => $street2->name,
            'block' => $block2->name,
            'no' => '24',
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house3 = House::create([
            'owner_name' => 'Sarip',
            'street' => $street4->name,
            'block' => $block4->name,
            'no' => '04',
            'area_id' => $area->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        /** Create House - End */

        $roleKetua = Role::create(['guard_name' => 'web', 'name' => 'Ketua', 'area_id' => $area->id]);
        $roleKetua->givePermissionTo(setArrayKetuaPermission());
        $userKetua = User::factory()->create([
            'name' => 'Nana Suherna',
            'slug' => Str::slug('Nana Suherna'),
            'image' => config('common.default_image_circle'),
            'email' => 'ketua@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
            'house_id' => $house1->id,
            'house_street_name' => $house1->street,
            'house_block' => $house1->block,
            'house_number' => $house1->no,
            'created_by' => 'Super Admin',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => 'web', 'name' => 'Bendahara', 'area_id' => $area->id]);
        $roleBendahara->givePermissionTo(setArrayBendaharaPermission());
        $userBendahara = User::factory()->create([
            'name' => 'Sarip',
            'slug' => Str::slug('sarip'),
            'image' => config('common.default_image_circle'),
            'email' => 'bendahara@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
            'house_id' => $house3->id,
            'house_street_name' => $house3->street,
            'house_block' => $house3->block,
            'house_number' => $house3->no,
            'created_by' => 'Super Admin',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => 'web', 'name' => 'Sekretaris', 'area_id' => $area->id]);
        $roleSekretaris->givePermissionTo(setArraySekretarisPermission());
        $userSekretaris = User::factory()->create([
            'name' => 'Jajang',
            'slug' => Str::slug('jajang'),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretaris@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area->id,
            'house_id' => $house2->id,
            'house_street_name' => $house2->street,
            'house_block' => $house2->block,
            'house_number' => $house2->no,
            'created_by' => 'Super Admin',
        ]);
        $userSekretaris->assignRole($roleSekretaris);
        /** Create Role & Permission User Seeder - End */

        /** Create Setting Member */
        $input = [
            [
                'key' => 'default_language',
                'value' => 'en',
                'area_id' => $area->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_date_format',
                'value' => 'Y-m-d',
                'area_id' => $area->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_time_format',
                'value' => 'H:i:s',
                'area_id' => $area->id,
                'created_by' => 'Super Admin',
            ],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }
        /** Create Setting Member - End */

        /** Create Account Category */
        $account_category_1 = AccountCategory::create([
            'name' => 'Pemasukan Tetap',
            'group' => 'Income',
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);

        $account_category_2 = AccountCategory::create([
            'name' => 'Sumbangan Warga',
            'group' => 'Income',
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);

        $account_category_3 = AccountCategory::create([
            'name' => 'Maintenance',
            'group' => 'Expense',
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);
        /** Create Account Category - End */

        /** Create Account */
        $account_1 = Account::create([
            'name' => 'IPL',
            'account_category_id' => $account_category_1->id,
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);

        $account_2 = Account::create([
            'name' => 'Sumbangan Warga a/n John',
            'account_category_id' => $account_category_2->id,
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);

        $account_3 = Account::create([
            'name' => 'Pembelian Alat Penerangan',
            'account_category_id' => $account_category_3->id,
            'area_id' => $area->id,
            'created_by' => 'Super Admin',
        ]);
        /** Create Account - End */
    }
}
