<?php

namespace Database\Seeders;

use App\Models\Uom;
use Illuminate\Database\Seeder;

class UomSeeder extends Seeder
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
                'uom_code' => 'Krt24',
                'uom_name' => 'Karton 24',
                'description' => 'Karton 24',
                'unit_code' => 'CTN',
            ],
            [
                'uom_code' => 'Krt30',
                'uom_name' => 'Karton 30',
                'description' => 'Karton 24',
                'unit_code' => 'CTN',
            ],
            [
                'uom_code' => 'Rtg6',
                'uom_name' => 'Renteng 6',
                'description' => 'Renteng 6',
                'unit_code' => 'RTG',
            ],
            [
                'uom_code' => 'Pcs',
                'uom_name' => 'Pieces',
                'description' => 'Pieces',
                'unit_code' => 'PCS',
            ],
        ];
        Uom::insert($data);
    }
}