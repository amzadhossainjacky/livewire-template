<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmailSmtpSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmailSmtpSettingModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'encryption' => 1,
            'username' => 'sakil.diu.cse@gmail.com',
            'password' => 'gsax kqiv fkkn tukr',
            'is_active' => 1,
            'is_default' => 1,
        ];
        EmailSmtpSetting::insert($item);
    }
}
