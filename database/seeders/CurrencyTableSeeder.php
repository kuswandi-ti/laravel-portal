<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['code' => 'IDR', 'text' => 'IDR (Indonesian Rupiah)', 'created_by' => 'Super Admin'],
            ['code' => 'USD', 'text' => 'US Dollar', 'created_by' => 'Super Admin'],
        ];
        foreach ($input as $item) {
            Currency::create($item);
        }
    }
}
