<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SmsGroup;

class SmsGroupModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sms_group_names = [
            ['id'=> 1, 'name'=>'Sms group name 1', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 2, 'name'=>'Sms group name 2', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 3, 'name'=>'Sms group name 3', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 4, 'name'=>'Sms group name 4', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 5, 'name'=>'Sms group name 5', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 6, 'name'=>'Sms group name 6', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 7, 'name'=>'Sms group name 7', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 8, 'name'=>'Sms group name 8', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 9, 'name'=>'Sms group name 9', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 10, 'name'=>'Sms group name 10', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 11, 'name'=>'Sms group name 11', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 12, 'name'=>'Sms group name 12', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')],
            ['id'=> 13, 'name'=>'Sms group name 13', 'is_active'=>rand(0,1), 'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')]
        ];
        SmsGroup::insert($sms_group_names);
    }
}
