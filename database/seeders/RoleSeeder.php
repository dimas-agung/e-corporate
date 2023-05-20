<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role_code' => 'ROLE000',
                'role_name' => 'Super User',
                'description' => 'Role All Akses',
            ],
            [
                'role_code' => 'ROLE001',
                'role_name' => 'Marketing',
                'description' => 'Role Marketing',
            ],
            [
                'role_code' => 'ROLE002',
                'role_name' => 'HRD',
                'description' => 'Role HRD',
            ],
            [
                'role_code' => 'ROLE003',
                'role_name' => 'Administrasi',
                'description' => 'Role Administrasi',
            ],


        ];
        Role::insert($data);
    }
}
