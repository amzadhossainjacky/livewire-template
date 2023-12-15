<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\LeadSource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeadModelSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total_records = 50;
        ## Starting message
        $this->command->warn(PHP_EOL . 'creating lead contacts');
        ## Truncate existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Lead::truncate();
        ## Starting progressbar
        $this->command->getOutput()->progressStart($total_records);

        $lead_source = LeadSource::pluck('id');
        $mobile_prefix = collect(['88017', '88018', '88016', '88015', '88019']);

        for ($i = 0; $i < $total_records; $i++) {
            DB::table('leads')->insert([
                'user_id' => 1,
                'owner_id' => 1,
                'lead_source_id' => $lead_source->random(),
                'primary_phone' => $mobile_prefix->random() . rand(10000000, 99999999),
                'contact_person' => fake()->name('male'),
                'alternative_phone' => $mobile_prefix->random() . rand(10000000, 99999999),
                'address' => fake()->address(),
                'email' => fake()->freeEmail(),
                'lead_priority' => mt_rand(1, 3),
                'lead_category' => mt_rand(1, 3),
                'last_follow_up_status' => 'call',
                'last_follow_up_date' => fake()->dateTimeBetween('now', '+10 days'),
                'is_customer' => 0,
                'is_active' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $this->command->getOutput()->progressAdvance();
        }

        ## Finished progressbar and success message
        $this->command->getOutput()->progressFinish();
        $this->command->info('created lead contacts');
    }
}
