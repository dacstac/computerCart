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
        User::insert([
            'username' => 'SuperAdmin',
            'email' => 'test@email.com',
            'name' => 'John',
            'first_surname' => 'Doe',
            'second_surname' => 'Doe',
            'username' => 'SuperAdmin',
            'password' => Hash::make('password'),
            'offers' => 0,
            'type' => 0,
            'number_phone' => 123456789,
        ]);
    }
}
