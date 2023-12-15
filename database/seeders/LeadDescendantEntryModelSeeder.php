<?php

namespace Database\Seeders;

use App\Models\LeadDescendant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadDescendantEntryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $lead_call_logs = DB::table('lead_call_logs')->get();

        foreach ($lead_call_logs as $index => $lead_call_log) {

            $find_descendant = LeadDescendant::where('lead_id', '=',$lead_call_log->lead_id)->where('lead_call_log_id',  '=', 0)->first();

            $find_descendant->lead_call_log_id = $lead_call_log->id;
            $find_descendant->save();

        }
    }
}
