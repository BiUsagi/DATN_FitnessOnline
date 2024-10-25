<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_name' => 'Trương Bá Sơn',
                'email' => 'tubanovel@gmail.com',
                'avatar' => 'profile-img.jpg',
                'address' => '123 Đường ABC, TP HCM',
                'birthday' => '2000-10-15',
                'gender' => 1, // Nam
                'password' => Hash::make('password123'), // Mã hoá mật khẩu
                'phone_number' => '0123456789',
                'created_at' => now(),
            ],
            [
                'user_name' => 'Nguyễn Văn Luân',
                'email' => 'nguyenb@example.com',
                'avatar' => 'dat.jpg',
                'address' => '456 Đường DEF, Hà Nội',
                'birthday' => '1998-07-23',
                'gender' => 0, // Nữ
                'password' => Hash::make('password456'),
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'user_name' => 'Phạm Đạt',
                'email' => 'phamdat@example.com',
                'avatar' => 'new-1.jpg',
                'address' => '789 Đường XYZ, Đà Nẵng',
                'birthday' => '1995-04-12',
                'gender' => 2, // Khác
                'password' => Hash::make('password789'),
                'phone_number' => '0912345678',
                'created_at' => now(),
            ],
            [
                'user_name' => 'Nguyễn Văn Rin',
                'email' => 'rin@example.com',
                'avatar' => 'dat.jpg',
                'address' => '456 Đường DEF, Hà Nội',
                'birthday' => '2004-07-23',
                'gender' => 0, // Nữ
                'password' => Hash::make('password456'),
                'phone_number' => '0987654321',
                'created_at' => now(),
            ],
            [
                'user_name' => 'Phạm Chiến',
                'email' => 'phamc@example.com',
                'avatar' => '7CC84950-B263-4389-B934-E77F86954053.JPG',
                'address' => '789 Đường XYZ, Đà Nẵng',
                'birthday' => '2012-04-12',
                'gender' => 2, // Khác
                'password' => Hash::make('password789'),
                'phone_number' => '0912345678',
                'created_at' => now(),
            ],
            [
                'user_name' => 'Phạm Tuấn',
                'email' => 'tuan@example.com',
                'avatar' => 'post 2.jpg',
                'address' => '789 Đường XYZ, Đà Nẵng',
                'birthday' => '2012-04-12',
                'gender' => 2, // Khác
                'password' => Hash::make('password789'),
                'phone_number' => '0912345678',
                'created_at' => now(),
            ],
        ]);
    }
}
