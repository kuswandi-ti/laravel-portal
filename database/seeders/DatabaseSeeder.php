<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MainDataSeeder;
use Database\Seeders\CurrencyTableSeeder;
use Database\Seeders\LanguagesTableSeeder;
use Database\Seeders\FormatDateTableSeeder;
use Database\Seeders\FormatTimeTableSeeder;
use Database\Seeders\SettingAdminTableSeeder;
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

        $this->call(CurrencyTableSeeder::class);
        $this->call(FormatDateTableSeeder::class);
        $this->call(FormatTimeTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(SettingAdminTableSeeder::class);
        $this->call(IndonesiaDatabaseSeeder::class);
        $this->call(MainDataSeeder::class);
    }
}
