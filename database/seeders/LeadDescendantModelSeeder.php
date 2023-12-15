<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\District;
use App\Models\LeadCallLog;
use Illuminate\Support\Str;
use App\Models\LeadDescendant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\LeadDescendantService;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeadDescendantModelSeeder extends Seeder
{

    protected $lead_descendant_service;

    public function __construct()
    {
        $this->lead_descendant_service = new LeadDescendantService();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leads = Lead::pluck('id');
        $districts = District::all();
        $district_ids = $districts->pluck('id');

        ## Starting message
        $this->command->warn(PHP_EOL . 'creating lead descendant');
        ## Truncate existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        LeadDescendant::truncate();
        ## Starting progressbar
        $this->command->getOutput()->progressStart($leads->count());


        $mobile_prefix = collect(['017', '018', '016', '015', '019']);

        foreach ($leads as $index => $lead_id) {
            $descendent_length = rand(3, 6);
            $district_id =  $district_ids->random();
            for ($i = 0; $i < $descendent_length; $i++) {
                $random_call_log = Lead::with('lead_call_log')->find($lead_id)->lead_call_log->random();
                DB::table('lead_descendants')->insert([
                    'user_id' => $random_call_log->user_id,
                    'lead_id' => $lead_id,
                    'district_id' => $district_id,
                    'lead_call_log_id' =>  $random_call_log->id,
                    'ticket_no' => $this->lead_descendant_service->generate_ticket_id(),
                    'unique_id' => Str::random(20),
                    'salutation' => rand(1, 2),
                    'first_name' => fake()->firstName,
                    'middle_name' =>  'bin',
                    'last_name' => fake()->lastName,
                    'age' => rand(15, 50),
                    'gender' => rand(1, 3),
                    'phone' => "88" . $mobile_prefix->random() . rand(10000000, 99999999),
                    'dob' =>  Carbon::now()->subYears(rand(15, 30)),
                    'email' => strtolower(fake()->firstName) . strtolower(fake()->lastName) . "{$i}@gmail.com",
                    'address' => fake()->address(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $this->command->getOutput()->progressAdvance();
            }
        }



        ## Finished progressbar and success message
        $this->command->getOutput()->progressFinish();
        $this->command->info('created lead descendant');
    }
}
