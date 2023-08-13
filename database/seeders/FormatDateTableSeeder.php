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
            ['code' => 'Y-m-d', 'text' => date('Y-m-d')],
            ['code' => 'd-m-Y', 'text' => date('d-m-Y')],
            ['code' => 'd/m/Y', 'text' => date('d/m/Y')],
            ['code' => 'm-d-Y', 'text' => date('m-d-Y')],
            ['code' => 'm.d.Y', 'text' => date('m.d.Y')],
            ['code' => 'm/d/Y', 'text' => date('m/d/Y')],
            ['code' => 'd.m.Y', 'text' => date('d.m.Y')],
            ['code' => 'd/M/Y', 'text' => date('d/M/Y')],
            ['code' => 'M/d/Y', 'text' => date('M/d/Y')],
            ['code' => 'd M, Y', 'text' => date('d M, Y')],
        ];
        foreach ($input as $item) {
            FormatDate::create($item);
        }
    }
}
