<?php

namespace Database\Seeders;

use App\Models\ProductCategoryType;
use Illuminate\Database\Seeder;

class ProductCategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data  = [
            [
                "product_category_type_code" => "PCT0001",
                "product_category_type_name" => "BRAND",
                "description" => "BRAND",
                "product_category_type_parent_code" => NULL
            ],
            [
                "product_category_type_code" => "PCT0002",
                "product_category_type_name" => "JENIS",
                "description" => "JENIS",
                "product_category_type_parent_code" => NULL
            ],
            [
                "product_category_type_code" => "PCT0003",
                "product_category_type_name" => "VARIANT",
                "description" => "VARIANT",
                "product_category_type_parent_code" => "PCT0004 "
            ],
            [
                "product_category_type_code" => "PCT0004",
                "product_category_type_name" => "SUB JENIS",
                "description" => "SUB JENIS",
                "product_category_type_parent_code" => "PCT0002"
            ]
        ];
        ProductCategoryType::insert($data);
    }
}
