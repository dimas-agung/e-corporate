<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
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
                'department_code' => 'DEPT001',
                'department_name' => 'Office Boy',
                'description' => 'Office Boy',
            ],
            [
                'department_code' => 'DEPT002',
                'department_name' => 'Finance & Accounting',
                'description' => 'Finance & Accounting',
            ],
            [
                'department_code' => 'DEPT003',
                'department_name' => 'Warehouse',
                'description' => 'OWarehouse',
            ],
            [
                'department_code' => 'DEPT004',
                'department_name' => 'HRGA',
                'description' => 'HRGA',
            ],
            [
                'department_code' => 'DEPT005',
                'department_name' => 'Production',
                'description' => 'Production',
            ],
            [
                'department_code' => 'DEPT006',
                'department_name' => 'Engineering',
                'description' => 'Engineering',
            ],
            [
                'department_code' => 'DEPT007',
                'department_name' => 'Purchasing',
                'description' => 'Purchasing',
            ],
            [
                'department_code' => 'DEPT008',
                'department_name' => 'Quality Control',
                'description' => 'Quality Control',
            ],
            [
                'department_code' => 'DEPT009',
                'department_name' => 'Information Technology',
                'description' => 'Information Technology',
            ],

        ];
        Department::insert($data);
    }
}
