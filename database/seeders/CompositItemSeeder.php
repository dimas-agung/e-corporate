<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompositItemSeeder extends Seeder
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
                'composit_code' => 'Krt24/Pcs',
                'item_number' => '0',
                'uom_code' => 'Krt24',
            ],
            [
                'composit_code' => 'Krt24/Pcs',
                'item_number' => '1',
                'uom_code' => 'Pcs',
            ],
            [
                'composit_code' => 'Krt30/Pcs',
                'item_number' => '0',
                'uom_code' => 'Krt30',
            ],
            [
                'composit_code' => 'Krt30/Pcs',
                'item_number' => '1',
                'uom_code' => 'Pcs',
            ],
            [
                'composit_code' => 'Pcs/Pcs',
                'item_number' => '0',
                'uom_code' => 'Pcs',
            ],
            [
                'composit_code' => 'Krt24/Rtg6/Pcs',
                'item_number' => '0',
                'uom_code' => 'Krt24',
            ],
            [
                'composit_code' => 'Krt24/Rtg6/Pcs',
                'item_number' => '1',
                'uom_code' => 'Rtg6',
            ],
            [
                'composit_code' => 'Krt24/Rtg6/Pcs',
                'item_number' => '2',
                'uom_code' => 'Pcs',
            ],

        ];
    }
}
