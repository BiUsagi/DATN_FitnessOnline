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
                'user_id' => 1,
                'staff_name' => 'Trương Bá Sơn',
                'email' => 'tubanovell@gmail.com',
                'avatar' => 'profile-img.jpg', // Avatar mặc định
                'gender' => 1, // Nam
                'birthday' => '1990-05-12',
                'rating' => 4.5,
                'rating_count' => 150,
                'address' => '123 Đường ABC, TP HCM',
                'phone_number' => '0912345678',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'staff_name' => 'Trần Thị Luân',
                'email' => 'staffb@example.com',
                'avatar' => 'luan.jpg',
                'gender' => 0, // Nữ
                'birthday' => '1985-11-23',
                'rating' => 3.8,
                'rating_count' => 75,
                'address' => '456 Đường DEF, Hà Nội',
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'staff_name' => 'Phạm Văn Đạt',
                'email' => 'staffssc@example.com',
                'avatar' => 'messages-3.jpg',
                'gender' => 3,
                'birthday' => '1992-07-19',
                'rating' => 4.0,
                'rating_count' => 100,
                'address' => '789 Đường GHI, Đà Nẵng',
                'phone_number' => '0934567890',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'staff_name' => 'Nguyễn Văn Rin',
                'email' => 'staffsb@example.com',
                'avatar' => 'dat.jpg',
                'gender' => 0, // Nữ
                'birthday' => '1985-11-23',
                'rating' => 4.2,
                'rating_count' => 175,
                'address' => '456 Đường DEF, Hà Nội',
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'user_id' => 5,
                'staff_name' => 'Phạm Chiến',
                'email' => 'staffcc@example.com',
                'avatar' => '7CC84950-B263-4389-B934-E77F86954053.JPG',
                'gender' => 3, // Giới tính khác (theo thiết lập mặc định)
                'birthday' => '1992-07-19',
                'rating' => 4.0,
                'rating_count' => 100,
                'address' => '789 Đường GHI, Đà Nẵng',
                'phone_number' => '0934567890',
                'created_at' => now(),
            ],
            [
                'user_id' => 6,
                'staff_name' => 'Phạm Tuấn',
                'email' => 'staffba@example.com',
                'avatar' => 'post 2.jpg',
                'gender' => 0, // Nữ
                'birthday' => '1985-11-23',
                'rating' => 2.6,
                'rating_count' => 715,
                'address' => '456 Đường DEF, Hà Nội',
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
        ]);
    }
}
