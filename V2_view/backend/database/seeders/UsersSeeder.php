<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'first_name' => 'Ahmad',
                'last_name' => 'ali',
                'email' => 'admin@example.com',
                'password' =>  bcrypt('admin'),
                'phone' => '0600000000',
                'gender' => 'Homme',
                'role' => 'admin',
            ],
            [
                'username' => 'user',
                'first_name' => 'Kamal',
                'last_name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('user'),
                'phone' => '0500000000',
                'gender' => 'Homme',
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
