<?php

namespace Database\Seeders;

use App\Models\FormatDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatDateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['code' => 'Y-m-d', 'text' => date('Y-m-d'), 'created_by' => 'Super Admin'],
            ['code' => 'd-m-Y', 'text' => date('d-m-Y'), 'created_by' => 'Super Admin'],
            ['code' => 'd/m/Y', 'text' => date('d/m/Y'), 'created_by' => 'Super Admin'],
            ['code' => 'm-d-Y', 'text' => date('m-d-Y'), 'created_by' => 'Super Admin'],
            ['code' => 'm.d.Y', 'text' => date('m.d.Y'), 'created_by' => 'Super Admin'],
            ['code' => 'm/d/Y', 'text' => date('m/d/Y'), 'created_by' => 'Super Admin'],
            ['code' => 'd.m.Y', 'text' => date('d.m.Y'), 'created_by' => 'Super Admin'],
            ['code' => 'd/M/Y', 'text' => date('d/M/Y'), 'created_by' => 'Super Admin'],
            ['code' => 'M/d/Y', 'text' => date('M/d/Y'), 'created_by' => 'Super Admin'],
            ['code' => 'd M, Y', 'text' => date('d M, Y'), 'created_by' => 'Super Admin'],
        ];
        foreach ($input as $item) {
            FormatDate::create($item);
        }
    }
}
