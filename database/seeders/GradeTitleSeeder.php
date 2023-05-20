<?php

namespace Database\Seeders;

use App\Models\GradeTitle;
use Illuminate\Database\Seeder;

class GradeTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "grade_title_code" => "GDT001",
                "grade_title_name" => "Executive",
                "description" => "Executive"
            ],
            [
                "grade_title_code" => "GDT002",
                "grade_title_name" => "Manager",
                "description" => "Manager"
            ],
            [
                "grade_title_code" => "GDT003",
                "grade_title_name" => "Supervisor",
                "description" => "Supervisor"
            ],
            [
                "grade_title_code" => "GDT004",
                "grade_title_name" => "Jr. Supervisor",
                "description" => "Jr. Supervisor"
            ],
            [
                "grade_title_code" => "GDT005",
                "grade_title_name" => "Staff",
                "description" => "Staff"
            ],
            [
                "grade_title_code" => "GDT006",
                "grade_title_name" => "Senior Operator",
                "description" => "Senior Operator"
            ],
            [
                "grade_title_code" => "GDT007",
                "grade_title_name" => "Operator",
                "description" => "Operator"
            ],
            [
                "grade_title_code" => "GDT008",
                "grade_title_name" => "Jr. Operator",
                "description" => "Jr. Operator"
            ]
        ];
        GradeTitle::insert($data);
    }
}
