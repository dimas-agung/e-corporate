<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
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
                "product_category_code" => "PC01001",
                "product_category_name" => "AGARASA",
                "description" => "AGARASA",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01002",
                "product_category_name" => "SILKY PUDDING",
                "description" => "SILKY PUDDING",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01003",
                "product_category_name" => "IKAN DORANG",
                "description" => "IKAN DORANG",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01004",
                "product_category_name" => "SANIA",
                "description" => "SANIA",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01005",
                "product_category_name" => "SOVIA",
                "description" => "SOVIA",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01006",
                "product_category_name" => "FORTUNE",
                "description" => "FORTUNE",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01007",
                "product_category_name" => "POP ICE",
                "description" => "POP ICE",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC01008",
                "product_category_name" => "NUTRIJELL",
                "description" => "NUTRIJELL",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0001 "
            ],
            [
                "product_category_code" => "PC02001",
                "product_category_name" => "TEPUNG",
                "description" => "TEPUNG",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0002 "
            ],
            [
                "product_category_code" => "PC02002",
                "product_category_name" => "BERAS",
                "description" => "BERAS",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0002 "
            ],
            [
                "product_category_code" => "PC02003",
                "product_category_name" => "MINYAK GORENG",
                "description" => "MINYAK GORENG",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0002 "
            ],
            [
                "product_category_code" => "PC02004",
                "product_category_name" => "JELLY",
                "description" => "JELLY INSTANT",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0002 "
            ],
            [
                "product_category_code" => "PC02005",
                "product_category_name" => "PUDDING",
                "description" => "PUDDING",
                "product_category_parent_code" => null,
                "product_category_type_code" => "PCT0002 "
            ],
            [
                "product_category_code" => "PC04001",
                "product_category_name" => "TEPUNG TERIGU",
                "description" => "TEPUNG TERIGU",
                "product_category_parent_code" => "PC02001",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04002",
                "product_category_name" => "TEPUNG TAPIOKA",
                "description" => "TEPUNG TAPIOKA",
                "product_category_parent_code" => "PC02001",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04003",
                "product_category_name" => "BERAS PREMIUM",
                "description" => "BERAS PREMIUM",
                "product_category_parent_code" => "PC02002",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04004",
                "product_category_name" => "BERAS BIASA",
                "description" => "BERAS ORIGINAL",
                "product_category_parent_code" => "PC02002",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04010",
                "product_category_name" => "MINYAK GORENG SAWIT",
                "description" => "MINYAK GORENG SAWIT",
                "product_category_parent_code" => "PC02003",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04005",
                "product_category_name" => "PUDDING INSTANT BUBUK",
                "description" => "PUDDING INSTANT BUBUK",
                "product_category_parent_code" => "PC02005",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04006",
                "product_category_name" => "PUDDING INSTANT RTD",
                "description" => "PUDDING INSTANT RTD",
                "product_category_parent_code" => "PC02005",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04007",
                "product_category_name" => "JELLY INSTANT BUBUK",
                "description" => "JELLY INSTANT BUBUK",
                "product_category_parent_code" => "PC02004",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04008",
                "product_category_name" => "JELLY INSTANT RTD",
                "description" => "JELLY INSTANT RTD",
                "product_category_parent_code" => "PC02004",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC04009",
                "product_category_name" => "JELLY INSTANT",
                "description" => "JELLY INSTANT",
                "product_category_parent_code" => "PC02004",
                "product_category_type_code" => "PCT0004 "
            ],
            [
                "product_category_code" => "PC03001",
                "product_category_name" => "PROTEIN SEDANG",
                "description" => "PROTEIN SEDANG",
                "product_category_parent_code" => "PC04001",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03002",
                "product_category_name" => "PROTEIN TINGGI",
                "description" => "PROTEIN TINGGI",
                "product_category_parent_code" => "PC04001",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03003",
                "product_category_name" => "TAPIOKA ORIGINAL",
                "description" => "TAPIOKA ORIGINAL",
                "product_category_parent_code" => "PC04002",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03004",
                "product_category_name" => "BERAS PREMIUM ORI",
                "description" => "BERAS PREMIUM ORI",
                "product_category_parent_code" => "PC04003",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03005",
                "product_category_name" => "BERAS PREMIUM PANDAN",
                "description" => "BERAS PREMIUM PANDAN",
                "product_category_parent_code" => "PC04003",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03006",
                "product_category_name" => "BERAS BIASA ORI",
                "description" => "BERAS BIASA ORI",
                "product_category_parent_code" => "PC04004",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03007",
                "product_category_name" => "BERAS BIASA PANDAN",
                "description" => "BERAS BIASA PANDAN",
                "product_category_parent_code" => "PC04004",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03008",
                "product_category_name" => "BERAS BIASA GRADE 1",
                "description" => "BERAS BIASA GRADE 1",
                "product_category_parent_code" => "PC04004",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03009",
                "product_category_name" => "COKLAT",
                "description" => "COKLAT",
                "product_category_parent_code" => "PC04005",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03010",
                "product_category_name" => "MELON",
                "description" => "MELON",
                "product_category_parent_code" => "PC04005",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03011",
                "product_category_name" => "VANILA",
                "description" => "VANILA",
                "product_category_parent_code" => "PC04005",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03012",
                "product_category_name" => "ORIGINAL",
                "description" => "ORIGINAL",
                "product_category_parent_code" => "PC04006",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03013",
                "product_category_name" => "COKLAT",
                "description" => "COKLAT",
                "product_category_parent_code" => "PC04006",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03014",
                "product_category_name" => "ORIGINAL",
                "description" => "ORIGINAL",
                "product_category_parent_code" => "PC04007",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03015",
                "product_category_name" => "STRAWBERRY",
                "description" => "STRAWBERRY",
                "product_category_parent_code" => "PC04007",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03016",
                "product_category_name" => "ORIGINAL",
                "description" => "ORIGINAL",
                "product_category_parent_code" => "PC04008",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03017",
                "product_category_name" => "ORIGINAL",
                "description" => "ORIGINAL",
                "product_category_parent_code" => "PC04009",
                "product_category_type_code" => "PCT0003 "
            ],
            [
                "product_category_code" => "PC03018",
                "product_category_name" => "ORIGINAL",
                "description" => "ORIGINAL",
                "product_category_parent_code" => "PC04010",
                "product_category_type_code" => "PCT0003"
            ]
        ];
        ProductCategory::insert($data);
    }
}
