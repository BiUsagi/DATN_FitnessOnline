<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'user_id' => 2,
                'staff_name' => 'Fitness Staff',
                'email' => 'fitsnessstaff@example.com',
                'avatar' => 'no-image.jpg',
                'facebook' => 'https://facebook.com/sonthichnovel',
                'gender' => 1,
                'birthday' => '1992-02-02',
                'introduction' => 'Giới thiệu Fitness Staff',
                'rating' => 3.8,
                'rating_count' => 5,
                'address' => '456 Đường XYZ, Hà Nội',
                'phone_number' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
