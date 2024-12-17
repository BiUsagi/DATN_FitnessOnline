<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_name' => 'Fitness Admin',
                'email' => 'fitnessadmin@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '123 Đường ABC, TP.HCM',
                'birthday' => '1990-01-01',
                'gender' => 0,
                'password' => Hash::make('Aa123456'),
                'phone_number' => '0123456789',
                'is_verified' => 1,
                'status' => 0,
                'role_012' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Fitness Staff',
                'email' => 'fitnessstaff@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '456 Đường XYZ, Hà Nội',
                'birthday' => '1992-02-02',
                'gender' => 1,
                'is_verified' => 1,
                'password' => Hash::make('Aa123456'),
                'phone_number' => '0987654321',
                'status' => 0,
                'role_012' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Fitness Customer',
                'email' => 'fitnesscustomer@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '456 Đường XYZ, Hà Nội',
                'birthday' => '1992-02-02',
                'gender' => 2,
                'is_verified' => 1,
                'password' => Hash::make('Aa123456'),
                'phone_number' => '0987654321',
                'status' => 0,
                'role_012' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
