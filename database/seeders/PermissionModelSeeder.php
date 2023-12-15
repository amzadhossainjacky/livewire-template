<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

/**
 * PermissionModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class PermissionModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'cancellation-list',
            'cancellation-create',
            'cancellation-edit',
            'cancellation-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'module_id' => 1, 'checked' => 1]);
        }
    }
}
