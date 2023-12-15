<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            'Unknown',
            'Dhaka',
            'Faridpur',
            'Gazipur',
            'Gopalganj',
            'Jamalpur',
            'Kishoreganj',
            'Madaripur',
            'Manikganj',
            'Munshiganj',
            'Mymensingh',
            'Narayanganj',
            'Narsingdi',
            'Netrokona',
            'Rajbari',
            'Shariatpur',
            'Sherpur',
            'Tangail',
            'Bogra',
            'Joypurhat',
            'Naogaon',
            'Natore',
            'Nawabganj',
            'Pabna',
            'Rajshahi',
            'Sirajgonj',
            'Dinajpur',
            'Gaibandha',
            'Kurigram',
            'Lalmonirhat',
            'Nilphamari',
            'Panchagarh',
            'Rangpur',
            'Thakurgaon',
            'Barguna',
            'Barisal',
            'Bhola',
            'Jhalokati',
            'Patuakhali',
            'Pirojpur',
            'Bandarban',
            'Brahmanbaria',
            'Chandpur',
            'Chittagong',
            'Comilla',
            'Cox\'s Bazar',
            'Feni',
            'Khagrachari',
            'Lakshmipur',
            'Noakhali',
            'Rangamati',
            'Habiganj',
            'Maulvibazar',
            'Sunamganj',
            'Sylhet',
            'Bagerhat',
            'Chuadanga',
            'Jessore',
            'Jhenaidah',
            'Khulna',
            'Kushtia',
            'Magura',
            'Meherpur',
            'Narail',
            'Satkhira',
        ];

        foreach ($districts as $district) {
            District::create([
                'district_name' => $district
            ]);
        }
    }
}
