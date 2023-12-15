<?php

namespace Database\Seeders;

use App\Models\Cancellation;
use App\Models\IssueSummary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * CancellationModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class CancellationModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue_summaries = IssueSummary::get()->pluck('id');

        $data = [
            'Pharmacy',
            'X-Ray',
            'Nurse Home Visit Request',
            'Doctor Home Visit Request',
            'Lab Tests',
            'Plan/ Package',
            'Doctor Appointment',
            'Covid General Test',
            'Covid Traveler Test',
        ];

        $id = IssueSummary::where('issue_summary_title', 'Cancellation')->first()->id;
        foreach ($data as $value) {
            Cancellation::create([
                'issue_summary_id' => $id,
                'cancellation_cause_name' => $value
            ]);
        }
    }
}
