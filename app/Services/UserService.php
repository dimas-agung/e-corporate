<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private String  $username;
    private String $password;

    public function login(String $username, String $password)
    {
        return Auth::attempt(['username' => $username, 'password' => $password]);
    }
    public function checkOldPasswordHint(String $username, String $old_password)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return false;
        }
        return Hash::check($old_password, $user->password);
    }
    public function changePassword(String $username, String $new_password)
    {
        $hashPassword = Hash::make($new_password);
        $user = User::where('username', $username)->update(['password' => $hashPassword]);
        if (!$user) {
            return false;
        }
        return true;
    }
    public function register(String $username, String $role_code,  String $password)
    {
        $hashPassword = Hash::make($password);
        $user = User::create([
            'username' => $username,
            'role_code' => $role_code,
            'password' => $hashPassword,
        ]);
        if (!$user) {
            return false;
        }
        return true;
    }
    public function create(array $input)
    {
        $hashPassword = Hash::make($input['password']);
        $user = User::create([
            'username' => $input['username'],
            'role_code' => $input['role_code'],
            'password' => $hashPassword,
        ]);
        if (!$user) {
            return false;
        }
        return $user;
    }
    public function create_batch(array $input)
    {
        $users = [];
        foreach ($input as $key => $value) {

            $hashPassword = Hash::make($value['password']);
            $user = User::create([
                'username' => $value['username'],
                'role_code' => $value['role_code'],
                'password' => $hashPassword,
            ]);
            $users[] = $user;
        }

        if (!$users) {
            return false;
        }
        return $users;
    }
}