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
                'user_id' => 1, // ID của user tương ứng trong bảng users
                'staff_name' => 'Nguyễn Văn A',
                'email' => 'staffa@example.com',
                'avatar' => 'profile-img.jpg', // Avatar mặc định
                'gender' => 1, // Nam
                'birthday' => '1990-05-12',
                'rating' => 4.5,
                'rating_count' => 150,
                'address' => '123 Đường ABC, TP HCM',
                'phone_number' => '0912345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'staff_name' => 'Trần Thị B',
                'email' => 'staffb@example.com',
                'avatar' => 'luan.jpg',
                'gender' => 0, // Nữ
                'birthday' => '1985-11-23',
                'rating' => 3.8,
                'rating_count' => 75,
                'address' => '456 Đường DEF, Hà Nội',
                'phone_number' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'staff_name' => 'Phạm Văn C',
                'email' => 'staffc@example.com',
                'avatar' => 'dat.jpg',
                'gender' => 3, // Giới tính khác (theo thiết lập mặc định)
                'birthday' => '1992-07-19',
                'rating' => 4.0,
                'rating_count' => 100,
                'address' => '789 Đường GHI, Đà Nẵng',
                'phone_number' => '0934567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
