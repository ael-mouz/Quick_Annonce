<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'password' =>  bcrypt('admin'),
                'phone' => '0000000000',
                'gender' => 'Homme',
                'role' => 'admin',
            ],
            [
                'username' => 'user',
                'first_name' => 'Normal',
                'last_name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('user'),
                'phone' => '0000000000',
                'gender' => 'Homme',
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
