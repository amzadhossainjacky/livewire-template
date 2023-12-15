<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * DoctorModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
class DoctorModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['doctor_department_id' => 1, 'doctor_name' => 'Dr.Raghib Manzoor'],

            ['doctor_department_id' => 2, 'doctor_name' => 'Dr. AHM Masud Sinha'],
            ['doctor_department_id' => 2, 'doctor_name' => 'Dr. Mohsin Zillur Karim'],
            ['doctor_department_id' => 2, 'doctor_name' => 'Dr. Mohammed Mizanur Rahman '],
            ['doctor_department_id' => 2, 'doctor_name' => 'Dr. Jannatul Ferdous '],
            ['doctor_department_id' => 2, 'doctor_name' => 'Dr.  A. Z. M. Ahsan Ullah'],
            ['doctor_department_id' => 2, 'doctor_name' => 'Dr. Munshi MB MD Shoaib Adnan '],


            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Wahida Khan Chowdhury '],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Sharmina Huq'],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Yasmin Joarder'],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Md. Shaukat Haidar'],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. MD Rezaul Islam '],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Asif Imran Imran '],
            ['doctor_department_id' => 3, 'doctor_name' => 'Prof. Dr. Hosne Ara Begum'],
            ['doctor_department_id' => 3, 'doctor_name' => 'Dr. Shamim Ara Sarkar'],


            ['doctor_department_id' => 4, 'doctor_name' => 'Dr. M. A. Mobin Talukder'],
            ['doctor_department_id' => 4, 'doctor_name' => 'Dr. Tarafdar Mohammad '],


            ['doctor_department_id' => 5, 'doctor_name' => 'Dr. Zubaer Ahmed'],
            ['doctor_department_id' => 5, 'doctor_name' => 'Dr. Sarwer Jamal Biplob'],
            ['doctor_department_id' => 5, 'doctor_name' => 'Dr. Lubna Sharmin'],
            ['doctor_department_id' => 5, 'doctor_name' => 'Dr. Nafees Uddin Chowdhury'],

            ['doctor_department_id' => 6, 'doctor_name' => 'Dr. A. T. M Faisal Rahman'],

            ['doctor_department_id' => 7, 'doctor_name' => 'Dr. Ahmed Farukh'],

            ['doctor_department_id' => 9, 'doctor_name' => 'Dr. Partho Pratik Roy'],

            ['doctor_department_id' => 10, 'doctor_name' => 'Dr. Shoib Ahmed'],

            ['doctor_department_id' => 11, 'doctor_name' => 'Ms. Nasima Akter'],
            ['doctor_department_id' => 11, 'doctor_name' => 'Shamim F. Karim'],

            ['doctor_department_id' => 12, 'doctor_name' => 'Dr. Muhammad Abul Hasnat'],
            ['doctor_department_id' => 12, 'doctor_name' => 'Dr. Mujibul Haque Mollah'],
            ['doctor_department_id' => 12, 'doctor_name' => 'Dr. Tania Mahbub'],

            ['doctor_department_id' => 13, 'doctor_name' => 'Dr. S.M. Saadi'],

            ['doctor_department_id' => 14, 'doctor_name' => 'Mahmuda Ferdous'],
            ['doctor_department_id' => 14, 'doctor_name' => 'Ms. Tazreen Mallick'],

            ['doctor_department_id' => 15, 'doctor_name' => 'Dr. Nowsheen Sharmin Purabi'],
            ['doctor_department_id' => 15, 'doctor_name' => 'Dr. Naz Yasmin'],
            ['doctor_department_id' => 15, 'doctor_name' => 'Dr. Salma Akter'],
            ['doctor_department_id' => 15, 'doctor_name' => 'Dr. Mariha Alam Chowdhury'],

            ['doctor_department_id' => 17, 'doctor_name' => 'Dr. Harun-ar-Rashid'],
            ['doctor_department_id' => 17, 'doctor_name' => 'Dr. Chowdhury Iqbal Mahmud'],
            ['doctor_department_id' => 17, 'doctor_name' => 'Dr. MD. Mofazzel Hoque'],

            ['doctor_department_id' => 18, 'doctor_name' => 'Dr.MD Abdur Rouf Siddique '],
            ['doctor_department_id' => 18, 'doctor_name' => 'Dr. Shahed Haider Chowdhury'],
            ['doctor_department_id' => 18, 'doctor_name' => 'Dr. Kazi Reshad Agaz'],

            ['doctor_department_id' => 19, 'doctor_name' => 'Dr. Md. Mahbub Ul Alam'],

            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Habibur Rahman'],
            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Afroza Haque'],
            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Parveen Akhter'],
            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Sajjadur Rahman'],
            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Mahbub Ahmed'],
            ['doctor_department_id' => 20, 'doctor_name' => 'Dr. Laila Nurun Nahar'],

            ['doctor_department_id' => 22, 'doctor_name' => 'Dr. Mohammad Rabiul Karim Khan Papon'],

            ['doctor_department_id' => 23, 'doctor_name' => 'Dr. Samira Yasmeen Ahmed'],
            ['doctor_department_id' => 23, 'doctor_name' => 'Dr. Jalal Mohsin Uddin'],
            ['doctor_department_id' => 23, 'doctor_name' => 'Dr. A. K. M Mustafa Hussain'],
            ['doctor_department_id' => 23, 'doctor_name' => 'Prof. Dr. Md. Tarek Alam'],

            ['doctor_department_id' => 24, 'doctor_name' => ' Dr. Tanita Noor'],

            ['doctor_department_id' => 25, 'doctor_name' => 'Dr.Md. Abu Saleh Esha'],

            ['doctor_department_id' => 28, 'doctor_name' => 'Dr. Ahmed Sharif'],
            ['doctor_department_id' => 28, 'doctor_name' => 'Dr Md. Fazla Rabbi Sirajuddin'],

            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Kabir Ahmed Khan'],
            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Shoaib Ahmad'],
            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Paramita Karim'],
            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Taslima Akter'],
            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Mosrose Salina'],
            ['doctor_department_id' => 8, 'doctor_name' => 'Dr. Ashutosh Saha '],

            ['doctor_department_id' => 16, 'doctor_name' => 'Dr. Shajia Fatema Zafar '],

            ['doctor_department_id' => 21, 'doctor_name' => 'Mr. Perpetuo "Joey" Dela Cruz'],
            ['doctor_department_id' => 21, 'doctor_name' => 'Ms. Renesa Sarah Anny'],

            ['doctor_department_id' => 14, 'doctor_name' => 'Ms. Noor E Jannat Fatema'],

            ['doctor_department_id' => 27, 'doctor_name' => 'Dr. Rokhshana Shireen'],
            ['doctor_department_id' => 27, 'doctor_name' => 'Dr. Mosammat Mahmuda Akhter'],
            ['doctor_department_id' => 27, 'doctor_name' => 'Dr. Meftaul Mawa'],

            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Tanjima Ahad Nisha'],
            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Humisha Ahmed'],
            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Sonjay Sutradhar'],
            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Saymon Sahariar'],
            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Mafruha Mehzabin'],
            ['doctor_department_id' => 26, 'doctor_name' => 'Dr. Ziaul Karim']

        ];
        foreach ($data as $value) {
            Doctor::create($value);
        }
    }
}
