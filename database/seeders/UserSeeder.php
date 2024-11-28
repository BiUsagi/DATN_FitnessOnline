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
                'user_name' => 'GymFit Admin',
                'email' => 'gymfitadmin@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '123 Đường ABC, TP.HCM',
                'birthday' => '1990-01-01',
                'gender' => 0,
                'password' => Hash::make('Aa123456'),
                'phone_number' => '0123456789',
                'status' => 0,
                'role_012' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'GymFit Staff',
                'email' => 'gymfitstaff@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '456 Đường XYZ, Hà Nội',
                'birthday' => '1992-02-02',
                'gender' => 1,
                'password' => Hash::make('Aa123456'),
                'phone_number' => '0987654321',
                'status' => 0,
                'role_012' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'GymFit Customer',
                'email' => 'gymfitcustomer@gmail.com',
                'avatar' => 'no-image.jpg',
                'address' => '456 Đường XYZ, Hà Nội',
                'birthday' => '1992-02-02',
                'gender' => 2,
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
