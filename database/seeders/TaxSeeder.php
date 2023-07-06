<?php

namespace Database\Seeders;

use App\Models\Tax;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
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
                "tax_code" => "PPN0",
                "tax_name" => "PPN 0%",
                "value" => 0.00,
                "valid_start_at" => "2021-01-01",
                "valid_end_at" => "9999-12-31"
            ],
            [
                "tax_code" => "PPN10",
                "tax_name" => "PPN 10%",
                "value" => 0.10,
                "valid_start_at" => "2020-01-01",
                "valid_end_at" => "2021-03-31"
            ],
            [
                "tax_code" => "PPN11",
                "tax_name" => "PPN 11%",
                "value" => 0.11,
                "valid_start_at" => "2021-04-01",
                "valid_end_at" => "2025-03-31"
            ],
            [
                "tax_code" => "PPN12",
                "tax_name" => "PPN 12%",
                "value" => 0.12,
                "valid_start_at" => "2025-04-01",
                "valid_end_at" => "2030-04-01"
            ],
            [
                "tax_code" => "PPH3",
                "tax_name" => "PPH 3%",
                "value" => 0.03,
                "valid_start_at" => "2021-01-01",
                "valid_end_at" => "9999-12-31"
            ],
            [
                "tax_code" => "PPH5",
                "tax_name" => "PPH 5%",
                "value" => 0.05,
                "valid_start_at" => "2021-01-01",
                "valid_end_at" => "9999-12-31"
            ]
        ];
        Tax::insert($data);
    }
}
