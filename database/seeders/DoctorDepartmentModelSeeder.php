<?php

namespace Database\Seeders;

use App\Models\DoctorDepartment;
use App\Models\IssueSummary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * DoctorDepartmentModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class DoctorDepartmentModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            '1' => 'Anesthesiology',
            '2' => 'Cardiology',
            '3' =>  'Dermatology',
            '4' => 'Diabetology',
            '5' => 'Dentistry',
            '6' => 'ENT',
            '7' => 'Energetic medicine & Acupuncture',
            '8' => 'Family medicine doctor (FMD)',
            '9' => 'Gastroenterology & Hepatology',
            '10' => 'Medicine',
            '11' => 'Mental Health Professionals',
            '12' => 'Nephrology',
            '13' => 'Neurology',
            '14' => 'Nutrition',
            '15' => 'OBS & Gyn',
            '16' => 'OBS & Gyne',
            '17' => 'Orthopedics',
            '18' => 'Opthalmology',
            '19' => 'Oncology',
            '20' => 'Pediatric',
            '21' => 'Physiotherapy',
            '22' => 'Plastic & General Surgery',
            '23' => 'Respiratory & Internal Medicine',
            '24' => 'Rheumatology',
            '25' => 'Radiology',
            '26' => 'Resident Physicians',
            '27' => 'Sonology/ Radiology',
            '28' => 'Urology',

        ];

        $id = IssueSummary::where('issue_summary_title', 'Doctor Information')->first()->id;
        foreach ($data as $value) {
            DoctorDepartment::create([
                'issue_summary_id' => $id,
                'department_name' => $value,
            ]);
        }
    }
}
