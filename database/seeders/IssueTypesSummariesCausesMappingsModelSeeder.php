<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IssueTypesSummariesCausesMapping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * IssueTypesSummariesCausesMappingsModelSeeder seeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class IssueTypesSummariesCausesMappingsModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $query_mapping = [
            ['issue_type_id' => 1, 'issue_summary_id' => 3, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 3, 'summary_cause_id' => 87],
            ['issue_type_id' => 1, 'issue_summary_id' => 3, 'summary_cause_id' => 77],
            ['issue_type_id' => 1, 'issue_summary_id' => 3, 'summary_cause_id' => 78],

            ['issue_type_id' => 1, 'issue_summary_id' => 4, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 4, 'summary_cause_id' => 87],
            ['issue_type_id' => 1, 'issue_summary_id' => 4, 'summary_cause_id' => 78],

            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 8],
            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 22],
            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 32],
            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 59],
            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 65],
            ['issue_type_id' => 1, 'issue_summary_id' => 9, 'summary_cause_id' => 68],

            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 88],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 72],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 38],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 87],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 39],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 89],
            ['issue_type_id' => 1, 'issue_summary_id' => 14, 'summary_cause_id' => 92],

            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 47],
            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 49],
            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 50],
            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 52],
            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 95],
            ['issue_type_id' => 1, 'issue_summary_id' => 20, 'summary_cause_id' => 97],

            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 2],
            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 38],
            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 72],
            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 26],
            ['issue_type_id' => 1, 'issue_summary_id' => 18, 'summary_cause_id' => 87],

            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 89],
            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 90],
            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 87],
            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 60],
            ['issue_type_id' => 1, 'issue_summary_id' => 19, 'summary_cause_id' => 63],

            ['issue_type_id' => 1, 'issue_summary_id' => 21, 'summary_cause_id' => 72],
            ['issue_type_id' => 1, 'issue_summary_id' => 21, 'summary_cause_id' => 99],
            ['issue_type_id' => 1, 'issue_summary_id' => 21, 'summary_cause_id' => 23],
            ['issue_type_id' => 1, 'issue_summary_id' => 21, 'summary_cause_id' => 28],
            ['issue_type_id' => 1, 'issue_summary_id' => 21, 'summary_cause_id' => 80],

            ['issue_type_id' => 1, 'issue_summary_id' => 11, 'summary_cause_id' => 77],
            ['issue_type_id' => 1, 'issue_summary_id' => 11, 'summary_cause_id' => 57],

            ['issue_type_id' => 1, 'issue_summary_id' => 6, 'summary_cause_id' => 9],
            ['issue_type_id' => 1, 'issue_summary_id' => 6, 'summary_cause_id' => 76],
            ['issue_type_id' => 1, 'issue_summary_id' => 6, 'summary_cause_id' => 51],
            ['issue_type_id' => 1, 'issue_summary_id' => 6, 'summary_cause_id' => 1],

            ['issue_type_id' => 1, 'issue_summary_id' => 12, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 12, 'summary_cause_id' => 72],
            ['issue_type_id' => 1, 'issue_summary_id' => 12, 'summary_cause_id' => 74],
            ['issue_type_id' => 1, 'issue_summary_id' => 12, 'summary_cause_id' => 87],
            ['issue_type_id' => 1, 'issue_summary_id' => 12, 'summary_cause_id' => 89],

            ['issue_type_id' => 1, 'issue_summary_id' => 2, 'summary_cause_id' => 57],
            ['issue_type_id' => 1, 'issue_summary_id' => 2, 'summary_cause_id' => 54],
            ['issue_type_id' => 1, 'issue_summary_id' => 2, 'summary_cause_id' => 55],

            ['issue_type_id' => 1, 'issue_summary_id' => 17, 'summary_cause_id' => 6],
            ['issue_type_id' => 1, 'issue_summary_id' => 17, 'summary_cause_id' => 53],
            ['issue_type_id' => 1, 'issue_summary_id' => 17, 'summary_cause_id' => 94],
            ['issue_type_id' => 1, 'issue_summary_id' => 17, 'summary_cause_id' => 56],
            ['issue_type_id' => 1, 'issue_summary_id' => 17, 'summary_cause_id' => 12],

            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 10],
            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 11],
            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 24],
            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 45],
            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 66],
            ['issue_type_id' => 1, 'issue_summary_id' => 5, 'summary_cause_id' => 81],

            ['issue_type_id' => 1, 'issue_summary_id' => 22, 'summary_cause_id' => 95],
            ['issue_type_id' => 1, 'issue_summary_id' => 22, 'summary_cause_id' => 97],
            ['issue_type_id' => 1, 'issue_summary_id' => 22, 'summary_cause_id' => 29],
            ['issue_type_id' => 1, 'issue_summary_id' => 22, 'summary_cause_id' => 98],

            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 82],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 21],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 61],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 64],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 67],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 100],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 14],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 70],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 15],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 100],
            ['issue_type_id' => 1, 'issue_summary_id' => 16, 'summary_cause_id' => 35],
        ];


        $complaint_mapping = [
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 83],
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 85],
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 3, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 83],
            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 85],
            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 4, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 59],
            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 71],
            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 10, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 73],
            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 74],
            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 21, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 14, 'summary_cause_id' => 83],
            ['issue_type_id' => 3, 'issue_summary_id' => 14, 'summary_cause_id' => 85],
            ['issue_type_id' => 3, 'issue_summary_id' => 14, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 14, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 14, 'summary_cause_id' => 86],

            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 17],
            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 48],
            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 20, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 23, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 23, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 23, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 23, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 24, 'summary_cause_id' => 84],
            ['issue_type_id' => 3, 'issue_summary_id' => 24, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 24, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 24, 'summary_cause_id' => 42],

            ['issue_type_id' => 3, 'issue_summary_id' => 12, 'summary_cause_id' => 73],
            ['issue_type_id' => 3, 'issue_summary_id' => 12, 'summary_cause_id' => 44],
            ['issue_type_id' => 3, 'issue_summary_id' => 12, 'summary_cause_id' => 86],
            ['issue_type_id' => 3, 'issue_summary_id' => 12, 'summary_cause_id' => 42],

        ];

        $service_requests_mapping = [
            ['issue_type_id' => 2, 'issue_summary_id' => 3, 'summary_cause_id' => 3],
            ['issue_type_id' => 2, 'issue_summary_id' => 3, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 4, 'summary_cause_id' => 3],
            ['issue_type_id' => 2, 'issue_summary_id' => 4, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 7, 'summary_cause_id' => 3],
            ['issue_type_id' => 2, 'issue_summary_id' => 7, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 23, 'summary_cause_id' => 4],
            ['issue_type_id' => 2, 'issue_summary_id' => 23, 'summary_cause_id' => 7],
            ['issue_type_id' => 2, 'issue_summary_id' => 23, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 19, 'summary_cause_id' => 5],
            ['issue_type_id' => 2, 'issue_summary_id' => 19, 'summary_cause_id' => 60],
            ['issue_type_id' => 2, 'issue_summary_id' => 19, 'summary_cause_id' => 63],
            ['issue_type_id' => 2, 'issue_summary_id' => 19, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 14, 'summary_cause_id' => 36],
            ['issue_type_id' => 2, 'issue_summary_id' => 14, 'summary_cause_id' => 37],
            ['issue_type_id' => 2, 'issue_summary_id' => 14, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 8, 'summary_cause_id' => 36],
            ['issue_type_id' => 2, 'issue_summary_id' => 8, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 15, 'summary_cause_id' => 36],
            ['issue_type_id' => 2, 'issue_summary_id' => 15, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 20, 'summary_cause_id' => 41],
            ['issue_type_id' => 2, 'issue_summary_id' => 20, 'summary_cause_id' => 75],

            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 18],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 20],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 25],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 79],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 13],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 27],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 69],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 93],
            ['issue_type_id' => 2, 'issue_summary_id' => 1, 'summary_cause_id' => 40],
        ];

        $data = [...$query_mapping, ...$service_requests_mapping, ...$complaint_mapping];

        foreach ($data as $value) {
            IssueTypesSummariesCausesMapping::create($value);
        }
    }
}
