<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['name' => 'Islam', 'created_by' => 'Super Admin'],
            ['name' => 'Katolik', 'created_by' => 'Super Admin'],
            ['name' => 'Protestan', 'created_by' => 'Super Admin'],
            ['name' => 'Hindu', 'created_by' => 'Super Admin'],
            ['name' => 'Budha', 'created_by' => 'Super Admin'],
            ['name' => 'Konghucu', 'created_by' => 'Super Admin'],
            ['name' => 'Other', 'created_by' => 'Super Admin'],
        ];
        foreach ($input as $item) {
            Religion::create($item);
        }
    }
}
