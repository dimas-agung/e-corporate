<?php

namespace Database\Seeders;

use App\Models\MaterialCategory;
use Illuminate\Database\Seeder;

class MaterialCategorySeeder extends Seeder
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
                "material_category_code" => "MCAT0001",
                "material_category_name" => "BAHAN BAKU",
                "description" => "RAW MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0002",
                "material_category_name" => "BAHAN ADDICTIVE",
                "description" => "ADDICTIVE MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0003",
                "material_category_name" => "BAHAN PREMIX",
                "description" => "PREMIX MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0004",
                "material_category_name" => "BAHAN KIMIA",
                "description" => "CHEMICAL MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0005",
                "material_category_name" => "BAHAN PACKAGING",
                "description" => "PACKING MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0006",
                "material_category_name" => "BAHAN LAIN LAIN",
                "description" => "OTHER MATERIAL",
                "material_category_code_parent" => null
            ],
            [
                "material_category_code" => "MCAT0007",
                "material_category_name" => "BAHAN PLASTIK",
                "description" => "PLASTIC MATERIAL",
                "material_category_code_parent" => "MCAT0005"
            ],
        ];

        MaterialCategory::insert($data);
    }
}
