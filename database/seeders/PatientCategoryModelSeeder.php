<?php

namespace Database\Seeders;

use App\Models\PatientCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * PatientCategoryModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class PatientCategoryModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['General', 'VIP	Corporate', 'Praava Employee	', 'Employee F&F', 'one', 'two', 'three'];
        foreach ($data as $value) {
            PatientCategory::create([
                'patient_category' => $value
            ]);
        }
    }
}
