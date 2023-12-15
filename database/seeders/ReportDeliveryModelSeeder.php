<?php

namespace Database\Seeders;

use App\Models\IssueSummary;
use App\Models\ReportDelivery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * ReportDeliveryModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class ReportDeliveryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue_summaries = IssueSummary::get()->pluck('id');

        $data = ['Covid General Test', 'Covid Traveler Test', 'X-Ray', 'Lab Tests', 'USG', 'ECHO', 'ETT', 'ECG', 'three'];

        $id = IssueSummary::where('issue_summary_title', 'Report Delivery')->first()->id;
        foreach ($data as $value) {
            ReportDelivery::create([
                'issue_summary_id' => $id,
                'report_name' => $value
            ]);
        }
    }
}
