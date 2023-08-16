<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['key' => 'company_name', 'value' => 'PT. Sekawan Kreatif Optima'],
            ['key' => 'site_title', 'value' => 'MyIPL'],
            ['key' => 'company_phone', 'value' => '021-505848'],
            ['key' => 'company_email', 'value' => 'admin@sko.com'],
            ['key' => 'company_address', 'value' => 'Cileungsi - Bogor'],
            ['key' => 'default_date_format', 'value' => 'Y-m-d'],
            ['key' => 'default_time_format', 'value' => 'H:i:s'],
            ['key' => 'default_currency', 'value' => 'IDR'],
            ['key' => 'default_language', 'value' => 'en'],
            ['key' => 'trial_days', 'value' => '30'],
            ['key' => 'company_logo', 'value' => config('common.default_image_circle')],
            ['key' => 'company_favicon', 'value' => config('common.default_image_circle')],
        ];
        foreach ($input as $item) {
            Setting::create($item);
        }
    }
}
