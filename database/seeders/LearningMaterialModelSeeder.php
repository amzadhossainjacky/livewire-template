<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\LearningMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LearningMaterialModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i <20 ; $i++) {
            LearningMaterial::create([
                'user_id' => 1,
                'title' => 'Chapter '.$i,
                'description' => Str::random(20).$i,
                'is_active' => rand(0,1),
            ]);
        }
    }
}
