<?php

namespace Database\Seeders;

use App\Models\PrincipleClass;
use Illuminate\Database\Seeder;

class PrincipleClassSeeder extends Seeder
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
                "principle_class_code" => "AR0001",
                "principle_class_name" => "WILMAR",
                "description" => "WILMAR",
                "is_active" => "1 "
            ],
            [
                "principle_class_code" => "AR0002",
                "principle_class_name" => "FORISA",
                "description" => "FORISA",
                "is_active" => "1 "
            ],
            [
                "principle_class_code" => "AR0003",
                "principle_class_name" => "INACO",
                "description" => "INACO",
                "is_active" => "0 "
            ],
            [
                "principle_class_code" => "AR0004",
                "principle_class_name" => "YAMAHA",
                "description" => "YAMAHA",
                "is_active" => "1 "
            ],
            [
                "principle_class_code" => "AR0005",
                "principle_class_name" => "SUZUKI",
                "description" => "SUZUKI",
                "is_active" => "0 "
            ],
            [
                "principle_class_code" => "AR0006",
                "principle_class_name" => "HONDA",
                "description" => "HONDA",
                "is_active" => "1"
            ]
        ];
        PrincipleClass::insert($data);
    }
}
