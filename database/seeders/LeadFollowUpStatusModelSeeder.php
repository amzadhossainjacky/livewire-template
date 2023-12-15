<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeadFollowUpStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * LeadFollowUpStatusModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class LeadFollowUpStatusModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Lead Follow up', 'Appointment sss   Follow         Up ', 'QMT lead follow up'];
        foreach ($data as $value) {
            LeadFollowUpStatus::create([
                'status_name' => $value
            ]);
        }
    }
}
