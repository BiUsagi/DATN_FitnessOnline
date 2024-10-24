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
                'email' => 'son@example.com',
                'avatar' => 'profile-img.jpg',
                'address' => '123 Đường ABC, TP HCM',
                'birthday' => '2000-10-15',
                'gender' => 1, // Nam
                'password' => Hash::make('password123'), // Mã hoá mật khẩu
                'phone_number' => '0123456789',
                'trial' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Nguyễn Văn B',
                'email' => 'nguyenb@example.com',
                'avatar' => 'dat.jpg',
                'address' => '456 Đường DEF, Hà Nội',
                'birthday' => '1998-07-23',
                'gender' => 0, // Nữ
                'password' => Hash::make('password456'),
                'phone_number' => '0987654321',
                'trial' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'Phạm C',
                'email' => 'phamc@example.com',
                'avatar' => 'luan.jpg',
                'address' => '789 Đường XYZ, Đà Nẵng',
                'birthday' => '1995-04-12',
                'gender' => 2, // Khác
                'password' => Hash::make('password789'),
                'phone_number' => '0912345678',
                'trial' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
