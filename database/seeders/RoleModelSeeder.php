<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * RoleModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class RoleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'admin', 'route_segment' => 'admin'],
            ['name' => 'call center', 'route_segment' => 'call Center'],
            ['name' => 'call center supervisor', 'route_segment' => 'call Center'],
            ['name' => 'marketing', 'route_segment' => 'marketing'],
            ['name' => 'marketing supervisor', 'route_segment' => 'marketing'],
            //['name' => 'developer', 'route_segment' => 'developer'],
        ];

        foreach ($data as $item) {
            Role::create([
                'name' => $item['name'],
                'route_segment' => $item['route_segment'],
                'guard_name' => 'web',
                'is_active' => 1,
            ]);
        }
    }
}
