<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            ['guard_name' => 'web', 'name' => 'lingkungan index', 'group_name' => 'Lingkungan Permission'],
            ['guard_name' => 'web', 'name' => 'lingkungan create', 'group_name' => 'Lingkungan Permission'],
            ['guard_name' => 'web', 'name' => 'lingkungan update', 'group_name' => 'Lingkungan Permission'],
            ['guard_name' => 'web', 'name' => 'staff index', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'web', 'name' => 'staff create', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'web', 'name' => 'staff update', 'group_name' => 'Staff Permission'],
            ['guard_name' => 'web', 'name' => 'staff non aktif', 'group_name' => 'Staff Permission'],
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

        // create roles and assign existing permissions
        $roleAdmin = Role::create(['guard_name' => 'web', 'name' => 'Admin']);
        $roleAdmin->givePermissionTo([
            'staff index',
            'staff create',
            'staff update',
            'staff non aktif',
            'lingkungan index',
            'lingkungan create',
            'lingkungan update',
        ]);

        $roleKetua = Role::create(['guard_name' => 'web', 'name' => 'Ketua']);
        $roleKetua->givePermissionTo([
            'lingkungan index',
            'staff index',
            'warga index',
            'pemasukan index',
            'pengeluaran index',
            'approve pengeluaran',
        ]);

        $roleBendahara = Role::create(['guard_name' => 'web', 'name' => 'Bendahara']);
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

        $roleSekretaris = Role::create(['guard_name' => 'web', 'name' => 'Sekretaris']);
        $roleSekretaris->givePermissionTo([
            'warga index',
            'warga create',
            'warga update',
            'warga non aktif',
        ]);

        $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider        

        // create demo users
        $userAdmin = User::factory()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'image' => '/images/no_image_circle.png',
            'email' => 'admin@mail.com',
        ]);
        $userAdmin->assignRole($roleAdmin);

        $userKetua = User::factory()->create([
            'name' => 'Ketua',
            'slug' => 'ketua',
            'image' => '/images/no_image_circle.png',
            'email' => 'ketua@mail.com',
        ]);
        $userKetua->assignRole($roleKetua);

        $userBendahara = User::factory()->create([
            'name' => 'Bendahara',
            'slug' => 'bendahara',
            'image' => '/images/no_image_circle.png',
            'email' => 'bendahara@mail.com',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $userSekretaris = User::factory()->create([
            'name' => 'Sekretaris',
            'slug' => 'sekretaris',
            'image' => '/images/no_image_circle.png',
            'email' => 'sekretaris@mail.com',
        ]);
        $userSekretaris->assignRole($roleSekretaris);

        $userSuperAdmin = new Admin();
        $userSuperAdmin->image = '/images/no_image_circle.png';
        $userSuperAdmin->name = 'Super Admin';
        $userSuperAdmin->email = 'superadmin@mail.com';
        $userSuperAdmin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $userSuperAdmin->status = 1;
        $userSuperAdmin->save();
        $userSuperAdmin->assignRole($roleSuperAdmin);
    }
}
