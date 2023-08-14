<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

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

        $roleKetua = Role::create(['guard_name' => 'web', 'name' => 'Ketua', 'member_id' => 1]);
        $roleKetua->givePermissionTo([
            'warga index',
            'pemasukan index',
            'pengeluaran index',
            'approve pengeluaran',
        ]);
        $userKetua = User::factory()->create([
            'name' => 'Ketua',
            'slug' => Str::slug('ketua'),
            'image' => '/images/no_image_circle.png',
            'email' => 'ketua@mail.com',
        ]);
        $userKetua->assignRole($roleKetua);

        $roleBendahara = Role::create(['guard_name' => 'web', 'name' => 'Bendahara', 'member_id' => 1]);
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
            'image' => '/images/no_image_circle.png',
            'email' => 'bendahara@mail.com',
        ]);
        $userBendahara->assignRole($roleBendahara);

        $roleSekretaris = Role::create(['guard_name' => 'web', 'name' => 'Sekretaris', 'member_id' => 1]);
        $roleSekretaris->givePermissionTo([
            'warga index',
            'warga create',
            'warga update',
            'warga non aktif',
        ]);
        $userSekretaris = User::factory()->create([
            'name' => 'Sekretaris',
            'slug' => Str::slug('sekretaris'),
            'image' => '/images/no_image_circle.png',
            'email' => 'sekretaris@mail.com',
        ]);
        $userSekretaris->assignRole($roleSekretaris);
    }
}
