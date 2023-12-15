<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Cancellation;
use App\Models\Lead;
use App\Models\Doctor;
use App\Models\FitnessCertificate;
use App\Models\LeadQuery;
use App\Models\IssueSummary;
use App\Models\IssueType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\IssueTypesSummariesCausesMapping;
use App\Models\PlanAndPackage;
use App\Models\Procedure;
use App\Models\ReportDelivery;

class LeadQueryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total_records = 50;

        ## Starting message
        $this->command->warn(PHP_EOL . 'creating lead query');
        ## Truncate existing records
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        LeadQuery::truncate();
        ## Starting progressbar
        $this->command->getOutput()->progressStart($total_records);

        ## Get all existing leads
        //$leads = Lead::all();
        $leads = Lead::with(['descendants'])->get();
        //$leads_ids = $leads->pluck('id');

        $fetch_issue_summary_mapping = IssueTypesSummariesCausesMapping::get()->pluck('id');


        foreach ($leads as $index => $lead) {

            $random_lead_id =  $lead->id;

            $lead_descendants = $lead->descendants;

            foreach ($lead_descendants as $descendent_index => $lead_descendent) {
                $query_length = rand(3, 5);
                for ($i = 0; $i <= $query_length; $i++) {
                    $random_issue_summary_mapping_id =  $fetch_issue_summary_mapping->random();

                    $issue_summary_mapping = IssueTypesSummariesCausesMapping::find($random_issue_summary_mapping_id);

                    $issue_summary = IssueSummary::find($issue_summary_mapping->issue_summary_id);
                    $issue_type = IssueType::find($issue_summary_mapping->issue_type_id);

                    ##check is it service request or not
                    $is_service_request = 0;
                    if ($issue_type->issue_name == "Service requests") {
                        $is_service_request = 1;
                    }

                    if ($issue_summary->issue_summary_title == "Cancellation") {
                        $cancellations_ids = Cancellation::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'campaign_id' => NULL,
                            'cancellation_id' => $cancellations_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Campaign") {
                        $campaign_ids = Campaign::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'campaign_id' => $campaign_ids,
                            'cancellation_id' => null,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Doctor Information") {
                        $doctor_ids = Doctor::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'doctor_id' => $doctor_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Fitness Certificate") {
                        $fitness_certificate_ids = FitnessCertificate::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'fitness_certificate_id' => $fitness_certificate_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Plan and Package") {
                        $plan_and_package_ids = PlanAndPackage::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'plan_and_package_id' => $plan_and_package_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Procedures") {
                        $procedure_ids = Procedure::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'procedure_id' => $procedure_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } elseif ($issue_summary->issue_summary_title == "Report Delivery") {
                        $report_deliveries_ids = ReportDelivery::get()->pluck('id')->random();

                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'report_delivery_id' => $report_deliveries_ids,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    } else {
                        DB::table('lead_queries')->insert([
                            'user_id' => $lead_descendent->user_id,
                            'lead_id' => $random_lead_id,
                            'lead_descendant_id' => $lead_descendent->id,
                            'lead_call_log_id' => $lead_descendent->lead_call_log_id,
                            'issue_type_id' => $issue_summary_mapping->issue_type_id,
                            'issue_summary_id' => $issue_summary_mapping->issue_summary_id,
                            'summary_cause_id' => $issue_summary_mapping->summary_cause_id,
                            'query_note' => NULL,
                            'is_service_request' => $is_service_request,
                            'is_confirmed' => rand(0, 1),
                            'call_session_id' => NULL,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            }





            $this->command->getOutput()->progressAdvance();
        }

        ## Finished progressbar and success message
        $this->command->getOutput()->progressFinish();
        $this->command->info('lead query creation finished');
    }
}
