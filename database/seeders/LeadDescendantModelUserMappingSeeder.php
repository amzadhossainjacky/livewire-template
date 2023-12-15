<?php

namespace Database\Seeders;

use App\Models\LeadDescendant;
use App\Models\LeadQuery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadDescendantModelUserMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lead_descendants = LeadDescendant::with('call_log')->get();
        foreach ($lead_descendants as $key => $item) {
            $lead_descendant = LeadDescendant::find($item->id);
            $lead_descendant->user_id = $item->call_log->user_id;
            $lead_descendant->save();
        }

        $lead_queries = LeadQuery::with('descendant')->get();
        foreach ($lead_queries as $key => $item) {
            $lead_query = LeadQuery::find($item->id);
            $lead_query->user_id = $item->descendant ? $item->descendant->user_id : 999999;
            $lead_query->lead_call_log_id = $item->descendant ? $item->descendant->lead_call_log_id : 999999;
            $lead_query->save();
        }
    }
}
