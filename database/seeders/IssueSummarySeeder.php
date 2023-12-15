<?php

namespace Database\Seeders;

use App\Models\IssueSummary;
use Illuminate\Database\Seeder;

/**
 * IssueSummarySeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class IssueSummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            '1' => 'Cancellation',
            '2' => 'Campaign',
            '3' => 'Covid Traveler Test',
            '4' => 'Covid General Test',
            '5' => 'Corporate',
            '6' => 'Discount',
            '7' => 'Doctor Appointment',
            '8' => 'Doctor Home Visit Request',
            '9' => 'Doctor Information',
            '10' => 'Doctor Service',
            '11' => 'Fitness Certificate',
            '12' => 'GAMCA',
            '13' => 'General',
            '14' => 'Lab Tests',
            '15' => 'Nurse Home Visit Request',
            '16' => 'Others',
            '17' => 'Payment',
            '18' => 'Plan and Package',
            '19' => 'Procedures',
            '20' => 'Pharmacy',
            '21' => 'Report Delivery',
            '22' => 'Vaccine',
            '23' => 'Plan / Package',
            '24' => 'Procedure',
        ];
        foreach ($data as $value) {
            IssueSummary::create([
                'issue_summary_title' => $value,
                'is_active' => rand(1, 1),
            ]);
        }
    }
}
