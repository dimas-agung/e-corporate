<?php

namespace Database\Seeders;

use App\Models\UomItem;
use Illuminate\Database\Seeder;

class UomItemSeeder extends Seeder
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
                'uom_desc' => 'Karton 24',
                'to_uom_code' => 'Krt24',
                'to_uom_desc' => 'Karton 24',
                'item_number' => '0',
                'value' => '1',

            ],
            [
                'uom_code' => 'Krt24',
                'uom_desc' => 'Karton 24',
                'to_uom_code' => 'Pcs',
                'to_uom_desc' => 'Pieces',
                'item_number' => '1',
                'value' => '24',
            ],
            [
                'uom_code' => 'Krt24',
                'uom_desc' => 'Karton 24',
                'to_uom_code' => 'Rtg6',
                'to_uom_desc' => 'Renteng 6',
                'item_number' => '2',
                'value' => '4',
            ],
            [
                'uom_code' => 'Krt30',
                'uom_desc' => 'Karton 30',
                'to_uom_code' => 'Krt30',
                'to_uom_desc' => 'Karton 30',
                'item_number' => '0',
                'value' => '1',
            ],
            [
                'uom_code' => 'Krt30',
                'uom_desc' => 'Karton 30',
                'to_uom_code' => 'Pcs',
                'to_uom_desc' => 'Pieces',
                'item_number' => '1',
                'value' => '30',
            ],
            [
                'uom_code' => 'Rtg6',
                'uom_desc' => 'Renteng 6',
                'to_uom_code' => 'Rtg6',
                'to_uom_desc' => 'Renteng 6',
                'item_number' => '0',
                'value' => '1',
            ],
            [
                'uom_code' => 'Rtg6',
                'uom_desc' => 'Renteng 6',
                'to_uom_code' => 'Pcs',
                'to_uom_desc' => 'Pieces',
                'item_number' => '1',
                'value' => '6',
            ],
            [
                'uom_code' => 'Pcs',
                'uom_desc' => 'Pieces',
                'to_uom_code' => 'Pcs',
                'to_uom_desc' => 'Pieces',
                'item_number' => '0',
                'value' => '1',
            ],
        ];
        UomItem::insert($data);
    }
}