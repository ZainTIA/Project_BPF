<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'store_name' => [
                'value' => 'Saints-Lastsons',
                'type' => 'text',
            ],
            'shipping_cost' => [
                'value' => '15000',
                'type' => 'integer',
            ],
            'bank_name' => [
                'value' => 'BCA',
                'type' => 'text',
            ],
            'bank_account' => [
                'value' => '',
                'type' => 'text',
            ],
            'bank_account_name' => [
                'value' => '',
                'type' => 'text',
            ],
            'low_stock_limit' => [
                'value' => '5',
                'type' => 'integer',
            ],
        ];


        foreach ($settings as $key => $setting) {
            Setting::updateOrCreate(
                ['key' => $key],
                $setting
            );
        }
    }
}
