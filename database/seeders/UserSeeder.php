<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function __construct(UserFactory $userService)
    {
        $this->userService = $userService;
    }
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
                'username' => 'EMP0000',
                'password' => '12345',
                'role_code' => 'ROLE000',
            ],
            [
                'username' => 'EMP0001',
                'password' => 'EMP0001',
                'role_code' => 'ROLE001',
            ],
            [
                'username' => 'EMP0002',
                'password' => 'EMP0002',
                'role_code' => 'ROLE002',
            ],
        ];

        foreach ($data as $key => $value) {
            $hashPassword = Hash::make($value['password']);
            $user = User::create([
                'username' => $value['username'],
                'role_code' => $value['role_code'],
                'password' => $hashPassword,
            ]);
            $users[] = $user;
        }
        // $user = $this->userService->create_batch($data);
    }
}
