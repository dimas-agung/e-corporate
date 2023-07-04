<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
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
                "material_code" => "MTR0001",
                "material_name" => "JAGUNG LOKAL 50KG",
                "material_nickname" => "JAGUNG LOKAL 50KG",
                "material_fullname" => "JAGUNG LOKAL 50KG",
                "uom_code" => "Pcs",
                "content_unit" => "50",
                "merk" => "CORN FLAKES",
                "type" => "",
                "spesification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0001"
            ],
            [
                "material_code" => "MTR0002",
                "material_name" => "JAGUNG IMPORT INDIA 50KG",
                "material_nickname" => "JAGUNG IMPORT INDIA 50KG",
                "material_fullname" => "JAGUNG IMPORT INDIA 50KG",
                "uom_code" => "Pcs",
                "content_unit" => "50",
                "merk" => "BISI 2",
                "type" => "GRADE A",
                "specification" => "95% UTUH",
                "serial_number" => "",
                "material_category_1" => "MCAT0001"
            ],
            [
                "material_code" => "MTR0003",
                "material_name" => "PMX F1 250519",
                "material_nickname" => "PREMIX FLOVOUR F1 250519",
                "material_fullname" => "PREMIX FLOVOUR F1 250519",
                "uom_code" => "Pcs",
                "content_unit" => "10",
                "merk" => "",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0003"
            ],
            [
                "material_code" => "MTR0004",
                "material_name" => "PMX F1 0807/19",
                "material_nickname" => "PREMIX FLOVOUR F1 0807/19",
                "material_fullname" => "PREMIX FLOVOUR F1 0807/19",
                "uom_code" => "Rtg6",
                "content_unit" => "10",
                "merk" => "",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0003"
            ],
            [
                "material_code" => "MTR0005",
                "material_name" => "MINYAK GORENG IKAN DORANG 18 LITER",
                "material_nickname" => "MINYAK GORENG IKAN DORANG 18 LITER",
                "material_fullname" => "MINYAK GORENG IKAN DORANG 18 LITER",
                "uom_code" => "Pcs",
                "content_unit" => "18",
                "merk" => "",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0001"
            ],
            [
                "material_code" => "MTR0006",
                "material_name" => "ASAM BENZOAT",
                "material_nickname" => "ASAM BENZOAT",
                "material_fullname" => "ASAM BENZOAT",
                "uom_code" => "Rtg6",
                "content_unit" => "100",
                "merk" => "BERNOFARM",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0004"
            ],
            [
                "material_code" => "MTR0007",
                "material_name" => "ASAM NITRAT",
                "material_nickname" => "ASAM NITRAT",
                "material_fullname" => "ASAM NITRAT",
                "uom_code" => "Rtg6",
                "content_unit" => "100",
                "merk" => "BERNOFARM",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0004"
            ],
            [
                "material_code" => "MTR0008",
                "material_name" => "TEPUNG TAPIOKA ROSE BRAND 334",
                "material_nickname" => "TEPUNG JAGUNG ROSE BRAND 334",
                "material_fullname" => "TEPUNG JAGUNG ROSE BRAND 334",
                "uom_code" => "Rtg6",
                "content_unit" => "25",
                "merk" => "ROSE BRAND",
                "type" => "",
                "specification" => "",
                "serial_number" => "",
                "material_category_1" => "MCAT0001"
            ]
        ];
        Material::insert($data);
    }
}
