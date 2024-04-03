<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = [
            [
                'address' => 'C/ Test 1',
                'cp' => '45058',
                'city' => 'City Test',
                'province' => 'Province Test',
                'country' => 'Spain',
                'user_id' => '1',
            ], [
                'address' => 'C/ Test 2',
                'cp' => '45058',
                'city' => 'City Test 2',
                'province' => 'Province Test 2',
                'country' => 'Spain',
                'user_id' => '1',
            ], [
                'address' => 'C/ Test 3',
                'cp' => '45058',
                'city' => 'City Test 3',
                'province' => 'Province Test 3',
                'country' => 'Spain',
                'user_id' => '2',
            ],
        ];

        foreach ($address as $addresses) {
            Address::create($addresses);
        }
    }
}
