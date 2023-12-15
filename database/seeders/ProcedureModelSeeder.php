<?php

namespace Database\Seeders;

use App\Models\IssueSummary;
use App\Models\Procedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * ProcedureModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class ProcedureModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue_summaries = IssueSummary::get()->pluck('id');

        $data = [
            '1' => 'USG',
            '2' => 'ECHO',
            '3' => 'ETT',
            '4' => 'ECG',
            '5' => 'X-Ray',
            '6' => 'CT Scan',
            '7' => 'MRI'
        ];

        $id = IssueSummary::where('issue_summary_title', 'Procedures')->first()->id;
        foreach ($data as $value) {
            Procedure::create([
                'issue_summary_id' => $id,
                'procedure_name' => $value
            ]);
        }
    }
}
