<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LanguagesTableSeeder;
use Database\Seeders\RolePermissionUserSeeder;
use Database\Seeders\RolePermissionAdminSeeder;
use Database\Seeders\RolePermissionMemberSeeder;
use KodePandai\Indonesia\IndonesiaDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(LanguagesTableSeeder::class);
        // $this->call(RolePermissionAdminSeeder::class);
        // $this->call(RolePermissionMemberSeeder::class);
        // $this->call(RolePermissionUserSeeder::class);

        $this->call(IndonesiaDatabaseSeeder::class);
    }
}
