<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
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
                "marital_status_code" => "MRTL001",
                "marital_status_name" => "BELUM KAWIN",
                "description" => "BELUM MENIKAH"
            ],
            [
                "marital_status_code" => "MRTL002",
                "marital_status_name" => "KAWIN",
                "description" => "SUDAH MENIKAH"
            ],
            [
                "marital_status_code" => "MRTL003",
                "marital_status_name" => "CERAI HIDUP",
                "description" => "CERAI HIDUP DUDA \/ JANDA"
            ],
            [
                "marital_status_code" => "MRTL004",
                "marital_status_name" => "CERAI MATI",
                "description" => "CERAI MATI DUDA \/ JANDA"
            ]
        ];
        MaritalStatus::insert($data);
    }
}
