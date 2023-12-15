<?php

namespace Database\Seeders;

use App\Models\SmsSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmsSettingModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'gateway_name' => "metrotel",
                'url' => 'http://portal.metrotel.com.bd/smsapi?api_key=',
                'api_key' => 'C2002178635a65ad9d0527.80762492',
                'sender_id' => '8809612442093',
                'is_active' => 1,
                'is_default' => 1
            ],
            [
                'gateway_name' => "zaman it",
            ],
            [
                'gateway_name' => "travistaltd",
            ]
        ];

        foreach ($items as $key => $item) {
            SmsSetting::insert($item);
        }
    }
}
