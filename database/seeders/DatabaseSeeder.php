<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LeadModelSeeder;
use Database\Seeders\RoleModelSeeder;
use Database\Seeders\UserModelSeeder;
use Database\Seeders\IssueSummarySeeder;
use Database\Seeders\CampaignModelSeeder;
use Database\Seeders\IssueTypeModelSeeder;
use Database\Seeders\LeadQueryModelSeeder;
use Database\Seeders\ProcedureModelSeeder;
use Database\Seeders\LeadSourceModelSeeder;
use Database\Seeders\SmsSettingModelSeeder;
use Database\Seeders\LeadCallLogModelSeeder;
use Database\Seeders\CancellationModelSeeder;
use Database\Seeders\LeadFollowUpModelSeeder;
use Database\Seeders\LeadDescendantModelSeeder;
use Database\Seeders\PlanAndPackageModelSeeder;
use Database\Seeders\ReportDeliveryModelSeeder;
use Database\Seeders\ExamQuestionSetModelSeeder;
use Database\Seeders\PatientCategoryModelSeeder;
use Database\Seeders\DoctorDepartmentModelSeeder;
use Database\Seeders\EmailSmtpSettingModelSeeder;
use Database\Seeders\LearningMaterialModelSeeder;
use Database\Seeders\IssueSummaryCauseModelSeeder;
use Database\Seeders\FitnessCertificateModelSeeder;
use Database\Seeders\LeadFollowUpStatusModelSeeder;
use Database\Seeders\SmsGroupModelSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\IssueTypesSummariesCausesMappingsModelSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleModelSeeder::class,
            UserModelSeeder::class,

            /* LeadSourceModelSeeder::class,
            IssueSummarySeeder::class,
            IssueTypeModelSeeder::class,
            IssueSummaryCauseModelSeeder::class,
            DoctorDepartmentModelSeeder::class,
            DoctorModelSeeder::class,
            LeadFollowUpStatusModelSeeder::class,
            PatientCategoryModelSeeder::class,
            ProcedureModelSeeder::class,
            ReportDeliveryModelSeeder::class,
            CampaignModelSeeder::class,
            PlanAndPackageModelSeeder::class,
            CancellationModelSeeder::class,
            FitnessCertificateModelSeeder::class,
            SmsSettingModelSeeder::class,
            LeadModelSeeder::class,
            IssueTypesSummariesCausesMappingsModelSeeder::class,
            EmailSmtpSettingModelSeeder::class,
            LearningMaterialModelSeeder::class,
            ExamQuestionSetModelSeeder::class,
            LeadCallLogModelSeeder::class,
            LeadDescendantModelSeeder::class,
            LeadQueryModelSeeder::class,
            SmsGroupModelSeeder::class,
            LeadFollowUpModelSeeder::class, */
        ]);

        /* $this->call([
          //LeadDescendantBackupModelSeeder::class,
          //LeadDescendantEntryModelSeeder::class,
        //   LeadDescendantModelUserMappingSeeder

        ]); */
    }
}
