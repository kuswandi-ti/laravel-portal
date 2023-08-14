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
            ['code' => 'IDR', 'text' => 'IDR (Indonesian Rupiah)'],
            ['code' => 'USD', 'text' => 'US Dollar'],
        ];
        foreach ($input as $item) {
            Currency::create($item);
        }
    }
}
