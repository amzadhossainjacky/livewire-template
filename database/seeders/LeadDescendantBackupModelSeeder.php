<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadDescendantBackupModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        $lead_descendants = DB::table('lead_descendants')->get();
        foreach ($lead_descendants as $index => $lead_descendant) {

            DB::table('lead_descendant_backups')->insert([
                'lead_id' => $lead_descendant->lead_id,
                'district_id' => $lead_descendant->district_id,
                'lead_call_log_id' =>  NULL,
                'ticket_no' => $lead_descendant->ticket_no,
                'unique_id' => $lead_descendant->unique_id,
                'salutation' => $lead_descendant->salutation,
                'first_name' => $lead_descendant->first_name,
                'middle_name' =>  $lead_descendant->middle_name,
                'last_name' => $lead_descendant->last_name,
                'age' => $lead_descendant->age,
                'gender' => $lead_descendant->gender,
                'phone' => $lead_descendant->phone,
                'dob' =>  $lead_descendant->dob,
                'email' => $lead_descendant->email,
                'address' => $lead_descendant->address,
                'created_at' => $lead_descendant->created_at,
                'updated_at' => $lead_descendant->updated_at,
            ]);
        }
    }
}
