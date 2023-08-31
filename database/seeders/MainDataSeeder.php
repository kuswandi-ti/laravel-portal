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
use App\Models\BankMember;
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
        $package = Package::create([
            'name' => 'Basic',
            'cost_per_month' => 50000,
            'cost_per_year' => 500000,
            'staff_limit_per_month' => 3,
            'user_limit_per_month' => 10,
            'wallet_amount_limit_per_month' => 500000,
            'live_chat_per_month' => 0,
            'support_ticket_per_month' => 0,
            'online_payment_per_month' => 0,
            'staff_limit_per_year' => 6,
            'user_limit_per_year' => 20,
            'wallet_amount_limit_per_year' => 1000000,
            'live_chat_per_year' => 0,
            'support_ticket_per_year' => 0,
            'online_payment_per_year' => 0,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** ============================================================================================ */
        /** GUARD ADMIN */
        /** 1. Create Residence Seeder (Guard Admin) */
        $residence_guard_admin = Residence::create([
            'name' => 'Guard Admin Residence Name',
            'slug' => Str::slug('Guard Admin Residence Name'),
            'province_code' => '32',
            'city_code' => '3201',
            'district_code' => '320107',
            'village_code' => '3201072009',
            'address' => 'Guard Admin Residence Address',
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 2. Create Area Seeder (Guard Admin) */
        $area_guard_admin = Area::create([
            'name' => 'Guard Admin Area Name',
            'slug' => Str::slug('Guard Admin Area Name'),
            'residence_id' => $residence_guard_admin->id,
            'package_id' => $package->id,
            'created_by' => 'Super Admin',
        ]);

        /** 3. Reset Cached Roles and Permissions */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** 4. Create Guard Admin Permission */
        $permissions_guard_admin = getArrayAllGuardAdminPermission();
        foreach ($permissions_guard_admin as $permission) {
            Permission::create($permission);
        }

        /** 5. Create Super Admin Role */
        $role_super_admin = Role::create([
            'guard_name' => getGuardNameAdmin(),
            'name' => 'Super Admin',
            'area_id' => $area_guard_admin->id
        ]);

        /** 6. Create Super Admin User */
        $user_super_admin = Admin::create([
            'name' => 'Super Admin User',
            'slug' => Str::slug('Super Admin User'),
            'email' => 'superadminuser@mail.com',
            'email_verified_at' => saveDateTimeNow(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area_guard_admin->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** 7. Assign Role to Super Admin User */
        $user_super_admin->assignRole($role_super_admin);
        /** ============================================================================================ */



        /** 1. Reset Cached Roles and Permissions */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** 2. Create Guard Member Permission */
        $permissions_guard_member = getArrayAllGuardMemberPermission();
        foreach ($permissions_guard_member as $permission) {
            Permission::create($permission);
        }

        /** 14. Reset Cached Roles and Permissions */
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /** 15. Create User Permission */
        $permissions_guard_user = getArrayAllGuardUserPermission();
        foreach ($permissions_guard_user as $permission) {
            Permission::create($permission);
        }



        /** ============================================================================================ */
        /** MEMBER & USER PH6 */
        /** 3. Create Residence Seeder (PH6) */
        $residence_ph6 = Residence::create([
            'name' => 'Puri Harmoni 6',
            'slug' => Str::slug('Puri Harmoni 6'),
            'province_code' => '32',
            'city_code' => '3201',
            'district_code' => '320107',
            'village_code' => '3201072009',
            'address' => 'Puri Harmoni 6, Ds. Situsari, Kec. Cileungsi, Kab. Bogor, Jawa Barat',
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 4. Create Area Seeder (PH6), RT 005 RW 011 */
        $area_ph6_rt5rw11ph6 = Area::create([
            'name' => 'RT 005 RW 011 PH6',
            'slug' => Str::slug('RT 005 RW 011 PH6'),
            'residence_id' => $residence_ph6->id,
            'rt' => '005',
            'rw' => '011',
            'province_code' => $residence_ph6->province_code,
            'city_code' => $residence_ph6->city_code,
            'district_code' => $residence_ph6->district_code,
            'village_code' => $residence_ph6->village_code,
            'postal_code' => '16820',
            'full_address' => 'Cileungsi - Bogor',
            'package_id' => $package->id,
            'package_type' => 'yearly',
            'membership_type' => 'trial',
            'register_date' => date_create('now')->format('Y-m-d'),
            'valid_to_date' => date('Y-m-d', strtotime('+30 days', strtotime(date_create('now')->format('Y-m-d')))),
            'cost' => $package->cost_per_year,
            'staff_limit' => $package->staff_limit_per_year,
            'user_limit' => $package->user_limit_per_year,
            'wallet_amount_limit' => $package->wallet_amount_limit_per_year,
            'live_chat' => $package->live_chat_per_year,
            'support_ticket' => $package->support_ticket_per_year,
            'online_payment' => $package->online_payment_per_year,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 5. Create Member Admin User (PH6), RT 005 RW 011 */
        $user_member_admin_area_rt5rw11ph6 = Member::create([
            'name' => 'Admin RT 005 RW 011 PH6',
            'slug' => Str::slug('Admin RT 005 RW 011 PH6'),
            'email' => 'adminrt5rw11ph6@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** 6. Create Member Admin Role (PH6), RT 005 RW 011 */
        $role_member_admin_rt5rw11ph6 = Role::create([
            'guard_name' => getGuardNameMember(),
            'name' => getGuardTextAdmin(),
            'area_id' => $area_ph6_rt5rw11ph6->id
        ]);

        /** 7. Assign Permission to Member Role (PH6), RT 005 RW 011 */
        $role_member_admin_rt5rw11ph6->givePermissionTo(setArrayMemberAdminPermission());

        /** 8. Assign Permission to Member Role (PH6), RT 005 RW 011 */
        $user_member_admin_area_rt5rw11ph6->assignRole($role_member_admin_rt5rw11ph6);

        /** 9. Create Area Seeder (PH6), RT 004 RW 011 */
        $area_ph6_rt4rw11ph6 = Area::create([
            'name' => 'RT 004 RW 011 PH6',
            'slug' => Str::slug('RT 004 RW 011 PH6'),
            'residence_id' => $residence_ph6->id,
            'rt' => '004',
            'rw' => '011',
            'province_code' => $residence_ph6->province_code,
            'city_code' => $residence_ph6->city_code,
            'district_code' => $residence_ph6->district_code,
            'village_code' => $residence_ph6->village_code,
            'postal_code' => '16820',
            'full_address' => 'Cileungsi - Bogor',
            'package_id' => $package->id,
            'package_type' => 'yearly',
            'membership_type' => 'trial',
            'register_date' => date_create('now')->format('Y-m-d'),
            'valid_to_date' => date('Y-m-d', strtotime('+30 days', strtotime(date_create('now')->format('Y-m-d')))),
            'cost' => $package->cost_per_year,
            'staff_limit' => $package->staff_limit_per_year,
            'user_limit' => $package->user_limit_per_year,
            'wallet_amount_limit' => $package->wallet_amount_limit_per_year,
            'live_chat' => $package->live_chat_per_year,
            'support_ticket' => $package->support_ticket_per_year,
            'online_payment' => $package->online_payment_per_year,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 10. Create Member Admin User (PH6), RT 004 RW 011 */
        $user_member_admin_area_rt4rw11ph6 = Member::create([
            'name' => 'Admin RT 004 RW 011 PH6',
            'slug' => Str::slug('Admin RT 004 RW 011 PH6'),
            'email' => 'adminrt4rw11ph6@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** 11. Create Member Admin Role (PH6), RT 004 RW 011 */
        $role_member_admin_rt4rw11ph6 = Role::create([
            'guard_name' => getGuardNameMember(),
            'name' => getGuardTextAdmin(),
            'area_id' => $area_ph6_rt4rw11ph6->id
        ]);

        /** 12. Assign Permission to Member Role (PH6), RT 004 RW 011 */
        $role_member_admin_rt4rw11ph6->givePermissionTo(setArrayMemberAdminPermission());

        /** 13. Assign Permission to Member Role (PH6), RT 004 RW 011 */
        $user_member_admin_area_rt4rw11ph6->assignRole($role_member_admin_rt4rw11ph6);

        /** 16. Create Street, Block, House (PH6), RT 005 RW 011 */
        $street1 = Street::create([
            'name' => 'Gg. Masjid I',
            'slug' => Str::slug('Gg. Masjid I'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street2 = Street::create([
            'name' => 'Gg. Masjid II',
            'slug' => Str::slug('Gg. Masjid II'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street3 = Street::create([
            'name' => 'Gg. Masjid III',
            'slug' => Str::slug('Gg. Masjid III'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street4 = Street::create([
            'name' => 'Gg. Masjid IV',
            'slug' => Str::slug('Gg. Masjid IV'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street5 = Street::create([
            'name' => 'Gg. Masjid V',
            'slug' => Str::slug('Gg. Masjid V'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $block1 = Block::create([
            'name' => 'F1',
            'slug' => Str::slug('F1'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block2 = Block::create([
            'name' => 'F2',
            'slug' => Str::slug('F2'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block3 = Block::create([
            'name' => 'F3',
            'slug' => Str::slug('F3'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block4 = Block::create([
            'name' => 'F4',
            'slug' => Str::slug('F4'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block5 = Block::create([
            'name' => 'F5',
            'slug' => Str::slug('F5'),
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $house1 = House::create([
            'owner_name' => 'Nana Suherna RT 005 RW 011 PH6',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '14',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house2 = House::create([
            'owner_name' => 'Jajang RT 005 RW 011 PH6',
            'street' => $street2->name,
            'block' => $block2->name,
            'no' => '24',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house3 = House::create([
            'owner_name' => 'Sarip RT 005 RW 011 PH6',
            'street' => $street4->name,
            'block' => $block4->name,
            'no' => '04',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house4 = House::create([
            'owner_name' => 'Kuswandi RT 005 RW 011 PH6',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '41',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 17. Create Role & Permission User (PH6), RT 005 RW 011 */
        $roleKetua = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Ketua', 'area_id' => $area_ph6_rt5rw11ph6->id]);
        $roleKetua->givePermissionTo(setArrayUserKetuaPermission());
        $userKetua = User::factory()->create([
            'name' => $house1->owner_name,
            'slug' => Str::slug($house1->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'ketuart5rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'house_id' => $house1->id,
            'house_street_name' => $house1->street,
            'house_block' => $house1->block,
            'house_number' => $house1->no,
            'created_by' => 'Super Admin',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Bendahara', 'area_id' => $area_ph6_rt5rw11ph6->id]);
        $roleBendahara->givePermissionTo(setArrayUserBendaharaPermission());
        $userBendahara = User::factory()->create([
            'name' => $house3->owner_name,
            'slug' => Str::slug($house3->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'bendaharart5rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'house_id' => $house3->id,
            'house_street_name' => $house3->street,
            'house_block' => $house3->block,
            'house_number' => $house3->no,
            'created_by' => 'Super Admin',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Sekretaris', 'area_id' => $area_ph6_rt5rw11ph6->id]);
        $roleSekretaris->givePermissionTo(setArrayUserSekretarisPermission());
        $userSekretaris = User::factory()->create([
            'name' => $house2->owner_name,
            'slug' => Str::slug($house2->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretarisrt5rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'house_id' => $house2->id,
            'house_street_name' => $house2->street,
            'house_block' => $house2->block,
            'house_number' => $house2->no,
            'created_by' => 'Super Admin',
        ]);
        $userSekretaris->assignRole($roleSekretaris);
        /** Create Role & Permission User Seeder - End */

        $user = User::factory()->create([
            'name' => $house4->owner_name,
            'slug' => Str::slug($house4->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'kuswandirt5rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'house_id' => $house4->id,
            'house_street_name' => $house4->street,
            'house_block' => $house4->block,
            'house_number' => $house4->no,
            'created_by' => 'Super Admin',
        ]);

        /** 18. Create Street, Block, House (PH6), RT 004 RW 011 */
        $street1 = Street::create([
            'name' => 'Gg. Masjid VI',
            'slug' => Str::slug('Gg. Masjid VI'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street2 = Street::create([
            'name' => 'Gg. Masjid VII',
            'slug' => Str::slug('Gg. Masjid VII'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street3 = Street::create([
            'name' => 'Gg. Masjid VIII',
            'slug' => Str::slug('Gg. Masjid VIII'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street4 = Street::create([
            'name' => 'Gg. Masjid IX',
            'slug' => Str::slug('Gg. Masjid IX'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street5 = Street::create([
            'name' => 'Gg. Masjid X',
            'slug' => Str::slug('Gg. Masjid X'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $block1 = Block::create([
            'name' => 'B1',
            'slug' => Str::slug('B1'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block2 = Block::create([
            'name' => 'B2',
            'slug' => Str::slug('B2'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block3 = Block::create([
            'name' => 'B3',
            'slug' => Str::slug('B3'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block4 = Block::create([
            'name' => 'B4',
            'slug' => Str::slug('B4'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block5 = Block::create([
            'name' => 'B5',
            'slug' => Str::slug('B5'),
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $house1 = House::create([
            'owner_name' => 'Nana Suherna RT 004 RW 011 PH6',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '14',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house2 = House::create([
            'owner_name' => 'Jajang RT 004 RW 011 PH6',
            'street' => $street2->name,
            'block' => $block2->name,
            'no' => '24',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house3 = House::create([
            'owner_name' => 'Sarip RT 004 RW 011 PH6',
            'street' => $street4->name,
            'block' => $block4->name,
            'no' => '04',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house4 = House::create([
            'owner_name' => 'Kuswandi RT 004 RW 011 PH6',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '41',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 19. Create Role & Permission User (PH6), RT 005 RW 011 */
        $roleKetua = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Ketua', 'area_id' => $area_ph6_rt4rw11ph6->id]);
        $roleKetua->givePermissionTo(setArrayUserKetuaPermission());
        $userKetua = User::factory()->create([
            'name' => $house1->owner_name,
            'slug' => Str::slug($house1->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'ketuart4rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'house_id' => $house1->id,
            'house_street_name' => $house1->street,
            'house_block' => $house1->block,
            'house_number' => $house1->no,
            'created_by' => 'Super Admin',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Bendahara', 'area_id' => $area_ph6_rt4rw11ph6->id]);
        $roleBendahara->givePermissionTo(setArrayUserBendaharaPermission());
        $userBendahara = User::factory()->create([
            'name' => $house3->owner_name,
            'slug' => Str::slug($house3->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'bendaharart4rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'house_id' => $house3->id,
            'house_street_name' => $house3->street,
            'house_block' => $house3->block,
            'house_number' => $house3->no,
            'created_by' => 'Super Admin',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Sekretaris', 'area_id' => $area_ph6_rt4rw11ph6->id]);
        $roleSekretaris->givePermissionTo(setArrayUserSekretarisPermission());
        $userSekretaris = User::factory()->create([
            'name' => $house2->owner_name,
            'slug' => Str::slug($house2->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretarisrt4rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'house_id' => $house2->id,
            'house_street_name' => $house2->street,
            'house_block' => $house2->block,
            'house_number' => $house2->no,
            'created_by' => 'Super Admin',
        ]);
        $userSekretaris->assignRole($roleSekretaris);

        $user = User::factory()->create([
            'name' => $house4->owner_name,
            'slug' => Str::slug($house4->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'kuswandirt4rw11ph6@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'house_id' => $house4->id,
            'house_street_name' => $house4->street,
            'house_block' => $house4->block,
            'house_number' => $house4->no,
            'created_by' => 'Super Admin',
        ]);

        /** 20. Create Role & Permission User (PH6), RT 005 RW 011 */
        $input = [
            [
                'key' => 'default_language',
                'value' => 'en',
                'area_id' => $area_ph6_rt5rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_date_format',
                'value' => 'Y-m-d',
                'area_id' => $area_ph6_rt5rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_time_format',
                'value' => 'H:i:s',
                'area_id' => $area_ph6_rt5rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'dues_amount',
                'value' => 50000,
                'area_id' => $area_ph6_rt5rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }

        /** 21. Create Account Category */
        $account_category_1 = AccountCategory::create([
            'name' => __('Regular Income'),
            'default' => 1,
            'group' => 'income',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_2 = AccountCategory::create([
            'name' => __('Irregular Income'),
            'group' => 'income',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_3 = AccountCategory::create([
            'name' => __('Regular Expense'),
            'group' => 'expense',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_4 = AccountCategory::create([
            'name' => __('Irregular Expense'),
            'group' => 'expense',
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);

        /** 22. Create Account (PH6), RT 005 RW 011 */
        $account_1 = Account::create([
            'name' => 'IPL',
            'default' => 1,
            'account_category_id' => $account_category_1->id,
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_2 = Account::create([
            'name' => __('Donation'),
            'account_category_id' => $account_category_2->id,
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_3 = Account::create([
            'name' => __('Garbage Fees'),
            'account_category_id' => $account_category_3->id,
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_4 = Account::create([
            'name' => __('Social Fund'),
            'account_category_id' => $account_category_4->id,
            'area_id' => $area_ph6_rt5rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);

        /** 23. Create Role & Permission User (PH6), RT 005 RW 011 */
        $input = [
            [
                'key' => 'default_language',
                'value' => 'en',
                'area_id' => $area_ph6_rt4rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_date_format',
                'value' => 'Y-m-d',
                'area_id' => $area_ph6_rt4rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_time_format',
                'value' => 'H:i:s',
                'area_id' => $area_ph6_rt4rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'dues_amount',
                'value' => 50000,
                'area_id' => $area_ph6_rt4rw11ph6->id,
                'created_by' => 'Super Admin',
            ],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }

        /** 24. Create Account Category (PH6), RT 004 RW 011 */
        $account_category_1 = AccountCategory::create([
            'name' => __('Regular Income'),
            'default' => 1,
            'group' => 'income',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_2 = AccountCategory::create([
            'name' => __('Irregular Income'),
            'group' => 'income',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_3 = AccountCategory::create([
            'name' => __('Regular Expense'),
            'group' => 'expense',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_4 = AccountCategory::create([
            'name' => __('Irregular Expense'),
            'group' => 'expense',
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);

        /** 25. Create Account (PH6), RT 004 RW 011 */
        $account_1 = Account::create([
            'name' => 'IPL',
            'default' => 1,
            'account_category_id' => $account_category_1->id,
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_2 = Account::create([
            'name' => __('Donation'),
            'account_category_id' => $account_category_2->id,
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_3 = Account::create([
            'name' => __('Garbage Fees'),
            'account_category_id' => $account_category_3->id,
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        $account_4 = Account::create([
            'name' => __('Social Fund'),
            'account_category_id' => $account_category_4->id,
            'area_id' => $area_ph6_rt4rw11ph6->id,
            'created_by' => 'Super Admin',
        ]);
        /** ============================================================================================ */



        /** ============================================================================================ */
        /** MEMBER & USER PHI */
        /** 3. Create Residence Seeder (PHI) */
        $residence_phi = Residence::create([
            'name' => 'Puri Hesti Insani',
            'slug' => Str::slug('Puri Hesti Insani'),
            'province_code' => '32',
            'city_code' => '3201',
            'district_code' => '320107',
            'village_code' => '3201072009',
            'address' => 'Puri Hesti Insani, Ds. Situsari, Kec. Cileungsi, Kab. Bogor, Jawa Barat',
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 4. Create Area Seeder (PHI), RT 001 RW 010 */
        $area_phi_rt1rw10phi = Area::create([
            'name' => 'RT 001 RW 010 PHI',
            'slug' => Str::slug('RT 001 RW 010 PHI'),
            'residence_id' => $residence_phi->id,
            'rt' => '005',
            'rw' => '011',
            'province_code' => $residence_phi->province_code,
            'city_code' => $residence_phi->city_code,
            'district_code' => $residence_phi->district_code,
            'village_code' => $residence_phi->village_code,
            'postal_code' => '16820',
            'full_address' => 'Cileungsi - Bogor',
            'package_id' => $package->id,
            'package_type' => 'yearly',
            'membership_type' => 'trial',
            'register_date' => date_create('now')->format('Y-m-d'),
            'valid_to_date' => date('Y-m-d', strtotime('+30 days', strtotime(date_create('now')->format('Y-m-d')))),
            'cost' => $package->cost_per_year,
            'staff_limit' => $package->staff_limit_per_year,
            'user_limit' => $package->user_limit_per_year,
            'wallet_amount_limit' => $package->wallet_amount_limit_per_year,
            'live_chat' => $package->live_chat_per_year,
            'support_ticket' => $package->support_ticket_per_year,
            'online_payment' => $package->online_payment_per_year,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 5. Create Member Admin User (PHI), RT 001 RW 010 */
        $user_member_admin_area_rt1rw10phi = Member::create([
            'name' => 'Admin RT 001 RW 010 PHI',
            'slug' => Str::slug('Admin RT 001 RW 010 PHI'),
            'email' => 'adminrt1rw10phi@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** 6. Create Member Admin Role (PHI), RT 001 RW 010 */
        $role_member_admin_rt1rw10phi = Role::create([
            'guard_name' => getGuardNameMember(),
            'name' => getGuardTextAdmin(),
            'area_id' => $area_phi_rt1rw10phi->id
        ]);

        /** 7. Assign Permission to Member Role (PHI), RT 001 RW 010 */
        $role_member_admin_rt1rw10phi->givePermissionTo(setArrayMemberAdminPermission());

        /** 8. Assign Permission to Member Role (PHI), RT 001 RW 010 */
        $user_member_admin_area_rt1rw10phi->assignRole($role_member_admin_rt1rw10phi);

        /** 9. Create Area Seeder (PHI), RT 002 RW 010 */
        $area_phi_rt2rw10phi = Area::create([
            'name' => 'RT 002 RW 010 PHI',
            'slug' => Str::slug('RT 002 RW 010 PHI'),
            'residence_id' => $residence_phi->id,
            'rt' => '004',
            'rw' => '011',
            'province_code' => $residence_phi->province_code,
            'city_code' => $residence_phi->city_code,
            'district_code' => $residence_phi->district_code,
            'village_code' => $residence_phi->village_code,
            'postal_code' => '16820',
            'full_address' => 'Cileungsi - Bogor',
            'package_id' => $package->id,
            'package_type' => 'yearly',
            'membership_type' => 'trial',
            'register_date' => date_create('now')->format('Y-m-d'),
            'valid_to_date' => date('Y-m-d', strtotime('+30 days', strtotime(date_create('now')->format('Y-m-d')))),
            'cost' => $package->cost_per_year,
            'staff_limit' => $package->staff_limit_per_year,
            'user_limit' => $package->user_limit_per_year,
            'wallet_amount_limit' => $package->wallet_amount_limit_per_year,
            'live_chat' => $package->live_chat_per_year,
            'support_ticket' => $package->support_ticket_per_year,
            'online_payment' => $package->online_payment_per_year,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 10. Create Member Admin User (PHI), RT 002 RW 010 */
        $user_member_admin_area_rt2rw10phi = Member::create([
            'name' => 'Admin RT 002 RW 010 PHI',
            'slug' => Str::slug('Admin RT 002 RW 010 PHI'),
            'email' => 'adminrt2rw10phi@mail.com',
            'email_verified_at' => date_create('now')->format('Y-m-d'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image' => config('common.default_image_circle'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_by' => 'Super Admin',
        ]);

        /** 11. Create Member Admin Role (PHI), RT 002 RW 010 */
        $role_member_admin_rt2rw10phi = Role::create([
            'guard_name' => getGuardNameMember(),
            'name' => getGuardTextAdmin(),
            'area_id' => $area_phi_rt2rw10phi->id
        ]);

        /** 12. Assign Permission to Member Role (PHI), RT 002 RW 010 */
        $role_member_admin_rt2rw10phi->givePermissionTo(setArrayMemberAdminPermission());

        /** 13. Assign Permission to Member Role (PHI), RT 002 RW 010 */
        $user_member_admin_area_rt2rw10phi->assignRole($role_member_admin_rt2rw10phi);

        /** 16. Create Street, Block, House (PHI), RT 001 RW 010 */
        $street1 = Street::create([
            'name' => 'Gg. Masjid I',
            'slug' => Str::slug('Gg. Masjid I'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street2 = Street::create([
            'name' => 'Gg. Masjid II',
            'slug' => Str::slug('Gg. Masjid II'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street3 = Street::create([
            'name' => 'Gg. Masjid III',
            'slug' => Str::slug('Gg. Masjid III'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street4 = Street::create([
            'name' => 'Gg. Masjid IV',
            'slug' => Str::slug('Gg. Masjid IV'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street5 = Street::create([
            'name' => 'Gg. Masjid V',
            'slug' => Str::slug('Gg. Masjid V'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $block1 = Block::create([
            'name' => 'F1',
            'slug' => Str::slug('F1'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block2 = Block::create([
            'name' => 'F2',
            'slug' => Str::slug('F2'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block3 = Block::create([
            'name' => 'F3',
            'slug' => Str::slug('F3'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block4 = Block::create([
            'name' => 'F4',
            'slug' => Str::slug('F4'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block5 = Block::create([
            'name' => 'F5',
            'slug' => Str::slug('F5'),
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $house1 = House::create([
            'owner_name' => 'Nana Suherna RT 001 RW 010 PHI',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '14',
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house2 = House::create([
            'owner_name' => 'Jajang RT 001 RW 010 PHI',
            'street' => $street2->name,
            'block' => $block2->name,
            'no' => '24',
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house3 = House::create([
            'owner_name' => 'Sarip RT 001 RW 010 PHI',
            'street' => $street4->name,
            'block' => $block4->name,
            'no' => '04',
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house4 = House::create([
            'owner_name' => 'Kuswandi RT 001 RW 010 PHI',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '41',
            'area_id' => $area_phi_rt1rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 17. Create Role & Permission User (PHI), RT 001 RW 010 */
        $roleKetua = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Ketua', 'area_id' => $area_phi_rt1rw10phi->id]);
        $roleKetua->givePermissionTo(setArrayUserKetuaPermission());
        $userKetua = User::factory()->create([
            'name' => $house1->owner_name,
            'slug' => Str::slug($house1->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'ketuart1rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt1rw10phi->id,
            'house_id' => $house1->id,
            'house_street_name' => $house1->street,
            'house_block' => $house1->block,
            'house_number' => $house1->no,
            'created_by' => 'Super Admin',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Bendahara', 'area_id' => $area_phi_rt1rw10phi->id]);
        $roleBendahara->givePermissionTo(setArrayUserBendaharaPermission());
        $userBendahara = User::factory()->create([
            'name' => $house3->owner_name,
            'slug' => Str::slug($house3->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'bendaharart1rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt1rw10phi->id,
            'house_id' => $house3->id,
            'house_street_name' => $house3->street,
            'house_block' => $house3->block,
            'house_number' => $house3->no,
            'created_by' => 'Super Admin',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Sekretaris', 'area_id' => $area_phi_rt1rw10phi->id]);
        $roleSekretaris->givePermissionTo(setArrayUserSekretarisPermission());
        $userSekretaris = User::factory()->create([
            'name' => $house2->owner_name,
            'slug' => Str::slug($house2->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretarisrt1rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt1rw10phi->id,
            'house_id' => $house2->id,
            'house_street_name' => $house2->street,
            'house_block' => $house2->block,
            'house_number' => $house2->no,
            'created_by' => 'Super Admin',
        ]);
        $userSekretaris->assignRole($roleSekretaris);
        /** Create Role & Permission User Seeder - End */

        $user = User::factory()->create([
            'name' => $house4->owner_name,
            'slug' => Str::slug($house4->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'kuswandirt1rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt1rw10phi->id,
            'house_id' => $house4->id,
            'house_street_name' => $house4->street,
            'house_block' => $house4->block,
            'house_number' => $house4->no,
            'created_by' => 'Super Admin',
        ]);

        /** 18. Create Street, Block, House (PHI), RT 002 RW 010 */
        $street1 = Street::create([
            'name' => 'Gg. Masjid VI',
            'slug' => Str::slug('Gg. Masjid VI'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street2 = Street::create([
            'name' => 'Gg. Masjid VII',
            'slug' => Str::slug('Gg. Masjid VII'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street3 = Street::create([
            'name' => 'Gg. Masjid VIII',
            'slug' => Str::slug('Gg. Masjid VIII'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street4 = Street::create([
            'name' => 'Gg. Masjid IX',
            'slug' => Str::slug('Gg. Masjid IX'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $street5 = Street::create([
            'name' => 'Gg. Masjid X',
            'slug' => Str::slug('Gg. Masjid X'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $block1 = Block::create([
            'name' => 'B1',
            'slug' => Str::slug('B1'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block2 = Block::create([
            'name' => 'B2',
            'slug' => Str::slug('B2'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block3 = Block::create([
            'name' => 'B3',
            'slug' => Str::slug('B3'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block4 = Block::create([
            'name' => 'B4',
            'slug' => Str::slug('B4'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $block5 = Block::create([
            'name' => 'B5',
            'slug' => Str::slug('B5'),
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        $house1 = House::create([
            'owner_name' => 'Nana Suherna RT 002 RW 010 PHI',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '14',
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house2 = House::create([
            'owner_name' => 'Jajang RT 002 RW 010 PHI',
            'street' => $street2->name,
            'block' => $block2->name,
            'no' => '24',
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house3 = House::create([
            'owner_name' => 'Sarip RT 002 RW 010 PHI',
            'street' => $street4->name,
            'block' => $block4->name,
            'no' => '04',
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);
        $house4 = House::create([
            'owner_name' => 'Kuswandi RT 002 RW 010 PHI',
            'street' => $street3->name,
            'block' => $block3->name,
            'no' => '41',
            'area_id' => $area_phi_rt2rw10phi->id,
            'status' => 1,
            'created_by' => 'Super Admin',
        ]);

        /** 19. Create Role & Permission User (PHI), RT 002 RW 010 */
        $roleKetua = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Ketua', 'area_id' => $area_phi_rt2rw10phi->id]);
        $roleKetua->givePermissionTo(setArrayUserKetuaPermission());
        $userKetua = User::factory()->create([
            'name' => $house1->owner_name,
            'slug' => Str::slug($house1->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'ketuart2rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt2rw10phi->id,
            'house_id' => $house1->id,
            'house_street_name' => $house1->street,
            'house_block' => $house1->block,
            'house_number' => $house1->no,
            'created_by' => 'Super Admin',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Bendahara', 'area_id' => $area_phi_rt2rw10phi->id]);
        $roleBendahara->givePermissionTo(setArrayUserBendaharaPermission());
        $userBendahara = User::factory()->create([
            'name' => $house3->owner_name,
            'slug' => Str::slug($house3->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'bendaharart2rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt2rw10phi->id,
            'house_id' => $house3->id,
            'house_street_name' => $house3->street,
            'house_block' => $house3->block,
            'house_number' => $house3->no,
            'created_by' => 'Super Admin',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => getGuardNameUser(), 'name' => 'Sekretaris', 'area_id' => $area_phi_rt2rw10phi->id]);
        $roleSekretaris->givePermissionTo(setArrayUserSekretarisPermission());
        $userSekretaris = User::factory()->create([
            'name' => $house2->owner_name,
            'slug' => Str::slug($house2->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'sekretarisrt2rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt2rw10phi->id,
            'house_id' => $house2->id,
            'house_street_name' => $house2->street,
            'house_block' => $house2->block,
            'house_number' => $house2->no,
            'created_by' => 'Super Admin',
        ]);
        $userSekretaris->assignRole($roleSekretaris);

        $user = User::factory()->create([
            'name' => $house4->owner_name,
            'slug' => Str::slug($house4->owner_name),
            'image' => config('common.default_image_circle'),
            'email' => 'kuswandirt2rw10phi@mail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'area_id' => $area_phi_rt2rw10phi->id,
            'house_id' => $house4->id,
            'house_street_name' => $house4->street,
            'house_block' => $house4->block,
            'house_number' => $house4->no,
            'created_by' => 'Super Admin',
        ]);

        /** 20. Create Role & Permission User (PHI), RT 001 RW 010 */
        $input = [
            [
                'key' => 'default_language',
                'value' => 'en',
                'area_id' => $area_phi_rt1rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_date_format',
                'value' => 'Y-m-d',
                'area_id' => $area_phi_rt1rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_time_format',
                'value' => 'H:i:s',
                'area_id' => $area_phi_rt1rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'dues_amount',
                'value' => 50000,
                'area_id' => $area_phi_rt1rw10phi->id,
                'created_by' => 'Super Admin',
            ],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }

        /** 21. Create Account Category (PHI), RT 001 RW 010 */
        $account_category_1 = AccountCategory::create([
            'name' => __('Regular Income'),
            'default' => 1,
            'group' => 'income',
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_2 = AccountCategory::create([
            'name' => __('Irregular Income'),
            'group' => 'income',
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_3 = AccountCategory::create([
            'name' => __('Regular Expense'),
            'group' => 'expense',
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_4 = AccountCategory::create([
            'name' => __('Irregular Expense'),
            'group' => 'expense',
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);

        /** 22. Create Account (PHI), RT 001 RW 010 */
        $account_1 = Account::create([
            'name' => 'IPL',
            'default' => 1,
            'account_category_id' => $account_category_1->id,
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_2 = Account::create([
            'name' => __('Donation'),
            'account_category_id' => $account_category_2->id,
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_3 = Account::create([
            'name' => __('Garbage Fees'),
            'account_category_id' => $account_category_3->id,
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_4 = Account::create([
            'name' => __('Social Fund'),
            'account_category_id' => $account_category_4->id,
            'area_id' => $area_phi_rt1rw10phi->id,
            'created_by' => 'Super Admin',
        ]);

        /** 23. Create Role & Permission User (PHI), RT 002 RW 010 */
        $input = [
            [
                'key' => 'default_language',
                'value' => 'en',
                'area_id' => $area_phi_rt2rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_date_format',
                'value' => 'Y-m-d',
                'area_id' => $area_phi_rt2rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'default_time_format',
                'value' => 'H:i:s',
                'area_id' => $area_phi_rt2rw10phi->id,
                'created_by' => 'Super Admin',
            ],
            [
                'key' => 'dues_amount',
                'value' => 50000,
                'area_id' => $area_phi_rt2rw10phi->id,
                'created_by' => 'Super Admin',
            ],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }

        /** 24. Create Account Category (PHI), RT 002 RW 010 */
        $account_category_1 = AccountCategory::create([
            'name' => __('Regular Income'),
            'default' => 1,
            'group' => 'income',
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_2 = AccountCategory::create([
            'name' => __('Irregular Income'),
            'group' => 'income',
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_3 = AccountCategory::create([
            'name' => __('Regular Expense'),
            'group' => 'expense',
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_category_4 = AccountCategory::create([
            'name' => __('Irregular Expense'),
            'group' => 'expense',
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);

        /** 25. Create Account (PHI), RT 002 RW 010 */
        $account_1 = Account::create([
            'name' => 'IPL',
            'account_category_id' => $account_category_1->id,
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_2 = Account::create([
            'name' => __('Donation'),
            'account_category_id' => $account_category_2->id,
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_3 = Account::create([
            'name' => __('Garbage Fees'),
            'account_category_id' => $account_category_3->id,
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        $account_4 = Account::create([
            'name' => __('Social Fund'),
            'account_category_id' => $account_category_4->id,
            'area_id' => $area_phi_rt2rw10phi->id,
            'created_by' => 'Super Admin',
        ]);
        /** ============================================================================================ */
    }
}
