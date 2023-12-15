<?php

namespace Database\Seeders;

use App\Models\IssueSummary;
use Illuminate\Database\Seeder;
use App\Models\FitnessCertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * FitnessCertificateModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class FitnessCertificateModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue_summaries = IssueSummary::get()->pluck('id');

        $data = [
            'Fit to Fly',
            'General Health',
        ];

        $id = IssueSummary::where('issue_summary_title', 'Fitness Certificate')->first()->id;
        foreach ($data as $value) {
            FitnessCertificate::create([
                'issue_summary_id' => $id,
                'certificate_name' => $value
            ]);
        }
    }
}
