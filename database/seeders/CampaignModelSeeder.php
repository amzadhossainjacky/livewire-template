<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\IssueSummary;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * CampaignModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class CampaignModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue_summaries = IssueSummary::get()->pluck('id');

        $data = ['Ghore Lab', 'Friday early bird offer'];

        $id = IssueSummary::where('issue_summary_title', 'Campaign')->first()->id;
        foreach ($data as $value) {
            Campaign::create([
                'issue_summary_id' => $id,
                'campaign_name' => $value
            ]);
        }
    }
}
