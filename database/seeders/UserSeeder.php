<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #Admin
        DB::table('users')->insert([
            'name' => "شروق عبدالله السحيمي",
            'employee_number' => "30571",
            'id_number' => "",
            'job_title' => "مديرة النظام",
            'type' => 'superadmin',
            'password' => Hash::make("Aw1410"),
        ]);

        $employees = [
            "78896" => ["name" => "مدني عبدالله الهندي", "job_title" => "شركة سمامة", "id_number" => Null],
            "096729" => ["name" => "حسين أبو عيفه", "job_title" => "شركة سمامة", "id_number" => Null],
            "12018" => ["name" => "خالد مناور السحيمي", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12021" => ["name" => "حاتم سعود اللهيي", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12001" => ["name" => "فوزي محمد المالكي", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12091" => ["name" => "إيمان محمد علي", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12069" => ["name" => "فاطمه عزيز الخناني", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12090" => ["name" => "حنان عبدالله الهندي", "job_title" => "عقود الحراسات", "id_number" => Null],
            "12082" => ["name" => "أمل حمد الحجيلي", "job_title" => "عقود الحراسات", "id_number" => Null],

            "4855745" => ["name" => "احمد معيض الكثيري", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1093972477"],
            "4855349" => ["name" => "ياسر سمير حويان الحربي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "108451020"],
            // "4855349" => ["name" => "سعود عايض المطرفي", "job_title"=> "مسؤول الأمن الصحي", "id_number" => "1067874683"],
            "4855366" => ["name" => "عاصم محمد عواد الأحمدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1079076236"],
            "4855358" => ["name" => "سلطان سلمان الحازمي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1083703023"],
            "4855323" => ["name" => "إبراهيم عبدالحميد الصاعدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1093329231"],
            // "4855666" => ["name" => "المنصور محمد الحازمي", "job_title"=> "مسؤول الأمن الصحي", "id_number" => "1072254798"],
            "4855659" => ["name" => "عيد سالم عياد الجهني", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1077379426"],
            "4855633" => ["name" => "أسامة سليمان العوفي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1112804891"],
            "4856171" => ["name" => "عبير خليوي الحربي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1064792284"],
            "4855645" => ["name" => "محمد صالح البركاني", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1090101633"],
            "4855688" => ["name" => "مهند سعد الحربي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1092518412"],
            "4855701" => ["name" => "عبدالعزيز حميد الصاعدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1015381443"],
            "51607305" => ["name" => "نشمي عازم ناشي الحربي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1081313361"],
            "51605759" => ["name" => "عيسى محمد علي هزازي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1089928806"],
            "51605320" => ["name" => "محمد طلال عامر العوفي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1084592326"],
            "51607317" => ["name" => "عادل مساعد سعد الصاعدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1090727288"],
            "51607311" => ["name" => "عبدالله هديبان عبدالله الصاعدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1069990636"],
            "51606245" => ["name" => "أسامة سليم حضيض الصاعدي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1099526814"],
            "51605487" => ["name" => "عبدالله عايد عماش السهلي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1107876425"],
            "51605011" => ["name" => "عبدالله نور السحيمي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1108714559"],
            "4855644" => ["name" => "محمد حميد حامد العوفي", "job_title" => "مسؤول الأمن الصحي", "id_number" => "1112905029"],
        ];

        foreach ($employees as $employee_number => $employee) {
            DB::table('users')->insert([
                'name' => $employee['name'],
                'employee_number' => $employee_number,
                'id_number' => $employee['id_number'],
                'job_title' => $employee['job_title'],
                'type' => 'employee',
                'password' => Hash::make("123456"),
            ]);
        }
    }
}
