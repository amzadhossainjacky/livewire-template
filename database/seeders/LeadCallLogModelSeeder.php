<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadSource;
use App\Models\LeadCallLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeadCallLogModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leads = Lead::pluck('id');
        $lead_sources = LeadSource::pluck('id');

        ## Starting message
        $this->command->warn(PHP_EOL . 'creating lead call log');
        ## Truncate existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        LeadCallLog::truncate();
        ## Starting progressbar
        $this->command->getOutput()->progressStart($leads->count());


        $mobile_prefix = collect(['017', '018', '016', '015', '019']);

        foreach ($leads as $index => $lead_id) {
            $children = rand(3, 6);
            for ($i = 0; $i < $children; $i++) {
                DB::table('lead_call_logs')->insert([
                    // 'user_id' => Lead::find($lead_id)->user_id,
                    'user_id' => User::get()->random()->id,
                    'lead_id' => $lead_id,
                    'lead_source_id' => $lead_sources->random(),
                    'conversion_type' => rand(1, 3),
                    'appointment_book_status' => rand(1, 3),
                    'start_time' => Carbon::now()->subMinutes(rand(2, 5)),
                    'end_time' =>   Carbon::now(),
                    'call_duration' => null,
                    'status' => null,
                    'call_notes' => fake()->paragraph(),
                    'resource_url' => null,
                    'direction' =>  'inbound',
                    'call_session_id' => null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $this->command->getOutput()->progressAdvance();
            }
        }



        ## Finished progressbar and success message
        $this->command->getOutput()->progressFinish();
        $this->command->info('created lead call log');
    }
}
