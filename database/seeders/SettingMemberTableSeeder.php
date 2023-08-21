<?php

namespace Database\Seeders;

use App\Models\SettingMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['key' => 'default_language', 'value' => 'en'],
        ];
        foreach ($input as $item) {
            SettingMember::create($item);
        }
    }
}
