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
            ['key' => 'site_title', 'value' => 'ErteAdmin'],
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
            ['key' => 'site_microsoft_api_host', 'value' => config('common.site_microsoft_api_host')],
            ['key' => 'site_microsoft_api_key', 'value' => config('common.site_microsoft_api_key')],
            ['key' => 'mail_type', 'value' => config('common.mail_mailer')],
            ['key' => 'mail_host', 'value' => config('common.mail_host')],
            ['key' => 'mail_username', 'value' => config('common.mail_username')],
            ['key' => 'mail_password', 'value' => config('common.mail_password')],
            ['key' => 'mail_encryption', 'value' => config('common.mail_encryption')],
            ['key' => 'mail_port', 'value' => config('common.mail_port')],
            ['key' => 'mail_from_address', 'value' => config('common.mail_from_address')],
            ['key' => 'mail_from_name', 'value' => config('common.mail_from_name')],
            ['key' => 'midtrans_environment', 'value' => config('common.midtrans_environment')],
            ['key' => 'midtrans_merchant_id', 'value' => config('common.midtrans_merchant_id')],
            ['key' => 'midtrans_client_key', 'value' => config('common.midtrans_client_key')],
            ['key' => 'midtrans_server_key', 'value' => config('common.midtrans_server_key')],
        ];
        foreach ($input as $item) {
            Setting::create($item);
        }
    }
}
