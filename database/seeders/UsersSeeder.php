<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'SuperAdmin',
                'email' => 'test@email.com',
                'name' => 'John',
                'first_surname' => 'Doe',
                'second_surname' => 'Eod',
                'password' => Hash::make('password'),
                'offers' => 0,
                'type' => 0,
                'number_phone' => 123456789,
            ],
            [
                'username' => 'Testing',
                'email' => 'testing@email.com',
                'name' => 'Foe',
                'first_surname' => 'Doe',
                'second_surname' => 'Moe',
                'password' => Hash::make('password'),
                'offers' => 0,
                'type' => 1,
                'number_phone' => 123456789,
            ]
        ];

        foreach ($user as $users) {
            User::create($users);
        }
    }
}
