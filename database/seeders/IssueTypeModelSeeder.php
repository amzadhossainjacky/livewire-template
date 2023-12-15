<?php

namespace Database\Seeders;

use App\Models\IssueType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * IssueTypeModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class IssueTypeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            '1' => 'query',
            '2' => 'service requests',
            '3' => 'complaint'
        ];
        foreach ($data as $value) {
            IssueType::create([
                'issue_name'    => $value,
                'is_active'     => 1,
            ]);
        }
    }
}
