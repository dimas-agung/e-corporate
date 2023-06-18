<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
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
                'unit_code' => 'CTN',
                'unit_name' => 'Karton',
                'description' => 'Karton',
            ],
            [
                'unit_code' => 'RTG',
                'unit_name' => 'Renteng',
                'description' => 'Renteng',
            ],
            [
                'unit_code' => 'PCS',
                'unit_name' => 'Pieces',
                'description' => 'Pieces',
            ],


        ];
        Unit::insert($data);
    }
}