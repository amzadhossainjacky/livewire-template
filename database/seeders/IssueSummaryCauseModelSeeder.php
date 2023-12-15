<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IssueSummaryCause;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * IssueSummaryCauseModelSeeder class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class IssueSummaryCauseModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $a = [
            '1' => 'Additional discount on services',
            '2' => 'Available tests name'
        ];

        $b = [
            '3' => 'Booked in Appointment tool',
            '4' => 'Booked for HUB',
            '5' => 'Booked in HIS',
            '6' => 'Bkash Merchant number',
            '7' => 'Booked for HSC'
        ];

        $c = [
            '8' => 'Consultation fees',
            '9' => 'Corporate discount',
            '10' => 'Covid General Test',
            '11' => 'Covid Traveler Test',
            '12' => 'Card payment process',
            '13' => 'Consultation price high',
            '14' => 'Called us mistakenly',
            '15' => 'Career info',
            '16' => 'Corporate',
        ];

        $d = [
            '17' => 'Delivery delay',
            '18' => 'Due to traffic jam/ VIP Movement',
            '19' => 'Doctor Home Visit Request',
            '20' => 'Due to Office/Personal issue',
            '21' => 'Drop call',
            '22' => 'Doctor roster',
            '23' => 'Due Status',
            '24' => 'Doctor Information',
            '25' => 'Doctor change',
            '26' => 'Discount',
            '27' => 'Doctor delay',
            '28' => 'DGHS'
        ];

        $e = [
            '29' => 'EPI vaccine',
            '30' => 'Employee F&F',
        ];

        $f = [
            '31' => 'Facebook comments (QMT)',
            '32' => 'Follow up fees',
            '33' => 'Facebook messenger (QMT)',
            '34' => 'F&F',
            '35' => 'Forward to other Dept.',
        ];

        $h = [
            '36' => 'HSC booked in Appointment tool',
            '37' => 'HUB collection booked in Appointment tool',
            '38' => 'HSC charges',
            '39' => 'HSC info',
            '40' => 'HSC charges high',
        ];

        $i = [
            '41' => 'Information shared in Pharmacy WhatsAPP',
            '42' => 'Info shared and Patient convinced',
            '43' => 'Instagram',
        ];

        $l = [
            '44' => 'Logged in Airtable',
            '45' => 'Lab Tests',
            '46' => 'LinkedIn',
        ];


        $m = [
            '47' => 'Medicine Price',
            '48' => 'Medicine mismatch',
            '49' => 'Medicine home delivery process',
            '50' => 'Medicine delivery charges',
            '51' => 'MFS discount',
            '52' => 'Medicine delivery TAT',
        ];

        $n = [
            '53' => 'Nagad Merchant number',
        ];

        $o = [
            '54' => 'Offer validity',
            '55' => 'Offer details',
            '56' => 'Online payment process',
        ];

        $p = [
            '57' => 'Price',
            '58' => 'Praava Website',
            '59' => 'Prescription not received yet',
            '60' => 'Prefer time Morning',
            '61' => 'Prank call',
            '62' => 'Praava Employee',
            '63' => 'Prefer time Evening',
            '64' => 'Praava Address',
            '65' => 'Prescription resend e-mail',
            '66' => 'Procedures',
            '67' => 'Praava opening/closing time',
            '68' => 'Patient will be late for appointment',
            '69' => "Patient's preferred time didn't match",
            '70' => 'Patient missed our OB calls',
            '71' => 'Prescription confusion'
        ];

        $r = [
            '72' => 'Report TAT',
            '73' => 'Report delay',
            '74' => 'Report confusion',
            '75' => 'Rescheduled',
            '76' => 'Running discount offer',
            '77' => 'Required Documents',
            '78' => 'Report E-mail',
            '79' => 'Report is not ready',
            '80' => 'Report resend',
            '81' => 'Report Delivery',
        ];

        $s = [
            '82' => 'Silent call',
            '83' => "Sample collector didn't reach yet",
            '84' => 'Shared in respective WhatsApp group',
            '85' => 'Sample collector behavioral issue',
            '86' => 'Shared in "Talk to Supervisor" group',
            '87' => 'Sample collection Time',
        ];

        $t = [
            '88' => 'Test prices',
            '89' => 'Test preparation',
            '90' => 'Test availability at Praava',
            '91' => 'Twitter',
            '92' => 'test invoice e-mail',
            '93' => 'Tests price high',
        ];


        $u = [
            '94' => 'Upay Merchant number',
        ];

        $v = [
            '95' => 'Vaccine price',
            '96' => 'VIP',
            '97' => 'Vaccine home delivery',
            '98' => 'Vaccine availability',
        ];

        $w = [
            '99' => 'Within TAT query',
            '100' => 'Want to talk with previous CCE',
        ];


        $data = [...$a, ...$b, ...$c, ...$d, ...$e, ...$f, ...$h, ...$i, ...$l, ...$m, ...$n, ...$o, ...$p, ...$r, ...$s, ...$t, ...$u, ...$v, ...$w];

        foreach ($data as $value) {
            IssueSummaryCause::create([
                'issue_summary_cause' => $value,
            ]);
        }
    }
}
