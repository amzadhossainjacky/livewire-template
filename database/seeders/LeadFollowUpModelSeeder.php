<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadFollowUp;
use Illuminate\Database\Seeder;
use App\Models\LeadFollowUpStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeadFollowUpModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $leads = Lead::with(['descendants'])->get();


        ## Starting message
        $this->command->warn(PHP_EOL . 'creating lead follow ups');
        ## Truncate existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        LeadFollowUp::truncate();
        ## Starting progressbar
        $this->command->getOutput()->progressStart($leads->count());
        $lead_follow_up_status = LeadFollowUpStatus::pluck('id');


        foreach ($leads as $index => $lead) {
            $inner_records = rand(3, 6);
            $lead_descendent = $lead->descendants->pluck('id');
            for ($i = 0; $i < $inner_records; $i++) {
                DB::table('lead_follow_ups')->insert([
                    'user_id' => User::get()->random()->id,
                    'lead_id' => $lead->id,
                    'lead_follow_up_status_id' => $lead_follow_up_status->random(),
                    'lead_follow_up_status_id' => 1,
                    'lead_descendant_id' => $lead_descendent->random(),
                    'follow_up_date' => _date_format(Carbon::now()->addDays(rand(2, 5)), 'Y-m-d'),
                    'follow_up_time' => _date_format(Carbon::now()->addDays(rand(2, 5)), 'G:i:s'),
                    'status' => '0',
                    'remarks' => fake()->paragraph(1),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $this->command->getOutput()->progressAdvance();
            }
        }

        ## Finished progressbar and success message
        $this->command->getOutput()->progressFinish();
        $this->command->info('created lead contacts');
    }
}
