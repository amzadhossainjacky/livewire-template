<?php

namespace Database\Seeders;

use App\Models\LeadSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * LeadSourceModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class LeadSourceModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Facebook page', 'Praava Website  ', 'Facebook comments (QMT)', 'Facebook messenger (QMT)', 'Instagram', 'Twitter', ' LinkedIn', 'Praava Employee', 'F&F', 'Inbound', 'Outbound'];
        foreach ($data as $value) {
            LeadSource::create([
                'name' => $value,
                'is_active' => 1
            ]);
        }
    }
}
