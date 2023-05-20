<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
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
                "department_code" => "DEPT001",
                "section_code" => "SECT001",
                "section_name" => "Kebersihan Umum",
                "description" => "Kebersihan Umum"
            ],
            [
                "department_code" => "DEPT001",
                "section_code" => "SECT002",
                "section_name" => "Tukang Kebun",
                "description" => "Tukang Kebun"
            ],
            [
                "department_code" => "DEPT002",
                "section_code" => "SECT003",
                "section_name" => "Account Receivable",
                "description" => "Account Receivable"
            ],
            [
                "department_code" => "DEPT002",
                "section_code" => "SECT004",
                "section_name" => "Account Payable",
                "description" => "Account Payable"
            ],
            [
                "department_code" => "DEPT003",
                "section_code" => "SECT005",
                "section_name" => "Operator Forklif",
                "description" => "Operator Forklif"
            ],
            [
                "department_code" => "DEPT003",
                "section_code" => "SECT006",
                "section_name" => "Admin Gudang",
                "description" => "Admin Gudang"
            ],
            [
                "department_code" => "DEPT003",
                "section_code" => "SECT007",
                "section_name" => "Warehouse Supervisor",
                "description" => "Warehouse Supervisor"
            ],
            [
                "department_code" => "DEPT004",
                "section_code" => "SECT008",
                "section_name" => "HRD",
                "description" => "HRD"
            ],
            [
                "department_code" => "DEPT004",
                "section_code" => "SECT009",
                "section_name" => "GA",
                "description" => "GA"
            ],
            [
                "department_code" => "DEPT005",
                "section_code" => "SECT010",
                "section_name" => "Operator Produksi",
                "description" => "Operator Produksi"
            ],
            [
                "department_code" => "DEPT005",
                "section_code" => "SECT011",
                "section_name" => "Packing",
                "description" => "Packing"
            ],
            [
                "department_code" => "DEPT006",
                "section_code" => "SECT012",
                "section_name" => "Mekanikal",
                "description" => "Mekanikal"
            ],
            [
                "department_code" => "DEPT006",
                "section_code" => "SECT013",
                "section_name" => "Automation",
                "description" => "Automation"
            ],
            [
                "department_code" => "DEPT008",
                "section_code" => "SECT014",
                "section_name" => "QC Lab",
                "description" => "QC Lab"
            ],
            [
                "department_code" => "DEPT008",
                "section_code" => "SECT015",
                "section_name" => "QC Field",
                "description" => "QC Field"
            ],
            [
                "department_code" => "DEPT009",
                "section_code" => "SECT016",
                "section_name" => "IT Funtional",
                "description" => "IT Funtional"
            ],
            [
                "department_code" => "DEPT009",
                "section_code" => "SECT017",
                "section_name" => "Hardware",
                "description" => "Hardware"
            ],
            [
                "department_code" => "DEPT009",
                "section_code" => "SECT018",
                "section_name" => "Software",
                "description" => "Software"
            ]
        ];
        Section::insert($data);
    }
}
