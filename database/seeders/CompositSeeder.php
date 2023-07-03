<?php

namespace Database\Seeders;

use App\Models\Composit;
use Illuminate\Database\Seeder;

class CompositSeeder extends Seeder
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
                'composit_name' => '1 Karton =  24 Pcs',
                'description' => '1 Karton =  24 Pcs',
            ],
            [
                'composit_code' => 'Krt30/Pcs',
                'composit_name' => '1 Karton =  30 Pcs',
                'description' => '1 Karton =  30 Pcs',
            ],
            [
                'composit_code' => 'Pcs/Pcs',
                'composit_name' => '1 Pcs = 1 Pcs',
                'description' => '1 Pcs = 1 Pcs',
            ],
            [
                'composit_code' => 'Krt24/Rtg6/Pcs',
                'composit_name' => '1 Karton = 4 Renteng, 1 Renteng = 6 Pcs',
                'description' => '1 Karton = 4 Renteng, 1 Renteng = 6 Sachet',
            ],

        ];
        Composit::insert($data);
    }
}
