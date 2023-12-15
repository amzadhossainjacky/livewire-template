<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * UserModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class UserModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = '12345678';
        $mobile_prefix = collect(['017', '018', '016', '015', '019']);

        $users = [
            [
                'code'              => '0001',
                'name'              => 'admin',
                'mobile'            => $mobile_prefix->random() . rand(10000000, 99999999),
                'email'             => 'admin@gmail.com',
                'password'          => $password,
                'gender'            => '1',
                'is_active'         => 1,
                'is_deletable'      => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

            [
                'code'              => '0002',
                'name'              => 'call center',
                'email'             => 'cc@gmail.com',
                'password'          => $password,
                'mobile'            => $mobile_prefix->random() . rand(10000000, 99999999),
                'gender'            => '1',
                'is_active'         => 1,
                'is_deletable'      => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'code'              => '0003',
                'name'              => 'call center supervisor',
                'email'             => 'ccsupervisor@gmail.com',
                'password'          => $password,
                'mobile'            => $mobile_prefix->random() . rand(10000000, 99999999),
                'gender'            => '1',
                'is_active'         => 1,
                'is_deletable'      => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'code'              => '0004',
                'name'              => 'marketing',
                'email'             => 'marketing@gmail.com',
                'password'          => $password,
                'mobile'            => $mobile_prefix->random() . rand(10000000, 99999999),
                'gender'            => '1',
                'is_active'         => 1,
                'is_deletable'      => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'code'              => '0005',
                'name'              => 'marketing supervisor',
                'email'             => 'marketingsupervisor@gmail.com',
                'password'          => $password,
                'mobile'            => $mobile_prefix->random() . rand(10000000, 99999999),
                'gender'            => '1',
                'is_active'         => 1,
                'is_deletable'      => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]

        ];

        foreach ($users as $key => $user) {
            $user = User::create($user);
            $user->assignRole($key + 1);
        }
    }
}
