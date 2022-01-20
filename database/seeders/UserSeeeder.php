<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => "Admin",
                'email' => "admin@perpus.com",
                'password' => Hash::make('secret123'),
                'role' => "1",
            ],
            [
                'name' => "User",
                'email' => "user@perpus.com",
                'password' => Hash::make('secret123'),
                'role' => "0",
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
