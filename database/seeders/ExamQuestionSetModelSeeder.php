<?php

namespace Database\Seeders;

use App\Models\ExamQuestionSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamQuestionSetModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['A', 'B', 'C', 'D'];
        foreach ($data as $value) {
            ExamQuestionSet::create([
                'set_name'    => $value,
                'is_active'     => 1,
            ]);
        }
    }
}
