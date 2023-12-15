<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * ModuleModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class ModuleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['cancellation'];

        Module::create([
            'module_name' => 'cancellation',
            'parent_checked' => 1,
            'label' => 'cancellation permission'
        ]);
    }
}
