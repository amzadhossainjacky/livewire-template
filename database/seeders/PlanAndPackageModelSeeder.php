<?php

namespace Database\Seeders;

use App\Models\IssueSummary;
use App\Models\PlanAndPackage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * PlanAndPackageModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class PlanAndPackageModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            '1' => '12 Month VC Plan',
            '2' => '3 Month VC Plan',
            '3' => '6 Month VC Plan',
            '4' => 'Home Health Check (HHC)',
            '5' => 'Dengue Test Package',
            '6' => 'Basic Home Health Check',
            '7' => 'Dengue - Chikungunya Combo Screening',
            '8' => 'Dengue + COVID-19 Identification Package',
            '9' => 'Dengue Recovery Package',
            '10' => 'COVID-19 Supportive package',
            '11' => 'Diabetes Check Package',
            '12' => 'His Health Check (Below 40 Years)',
            '13' => 'His Health Check (40 to 65 Years)',
            '14' => 'His Health Check (Above 65 Years)',
            '15' => 'Her Health Check (Below 40 Years)',
            '16' => 'Her Health Check (40 to 65 Years)',
            '17' => 'Her Health Check (Above 65 Years)',
            '18' => 'HIS Hormone Screening',
            '19' => 'HER Hormone Screening',
            '20' => 'Diabetes Plan',
            '21' => 'Diabetes Screening',
            '22' => 'Vitamin D package',
            '23' => 'Smile Package',
            '24' => 'Thyroid and Hyperlipidemia Screening',
            '25' => 'Maternity Plan',
            '26' => 'Corporate Package (Marketing)',
            '27' => 'Drug Screening',
            '28' => 'Essential Cardiac Screening',
            '29' => 'Praava Gold AMP',
            '30' => 'Praava Platinum AMP',
            '31' => 'Praava Silver AMP',
            '32' => 'Prediabetes Plan',
            '33' => 'Corporate Package',
            '34' => 'Kidney Screening',
            '35' => 'Liver Screening',
            '36' => 'PRP (Full Body)-Wedding Offer',
            '37' => 'Thyroid Check-up',
            '38' => 'Routine Diabetes Management',
            '39' => 'Hepatitis Screening',
            '40' => 'Essential Cardiac Screening',
            '41' => 'Essential Vitamin Check-Up',
            '42' => 'Student Health Check',
            '43' => 'Smoker Health Check',
            '44' => 'Monthly Nursing Home visit',
            '45' => 'Special Health Check',
            '46' => 'Weight loss package-Basic',
            '47' => 'Prostate Health Check',
        ];


        $id = IssueSummary::where('issue_summary_title', 'Plan and Package')->first()->id;
        foreach ($data as $value) {
            PlanAndPackage::create([
                'issue_summary_id' => $id,
                'plan_and_package_name' => $value
            ]);
        }
    }
}
