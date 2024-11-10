<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'customer']);

        // Tạo các quyền
        $permissions = [
            'access_dashboard',             // truy cập dashboard
            'manage_workout_packages',      // quản lý gói tập
            'manage_exercises',             // quản lí bài tập
            'manage_posts',                 // quản lí bài viết
            'manage_comments',              // quản lý bình luận
            'customer_support',             // hỗ trợ khách hàng
            'manage_config',                // cấu hình
            'manage_order',                 // đơn hàng
            'manage_statistical',           // thống kê
            'manage_marketing',             // marketing
            'manage_component',             // 
            'manage_slides',                // slide
            'manage_accounts',              // tài khoản
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }


        $adminRole = Role::findByName('admin');
        $staffRole = Role::findByName('staff');


        $adminRole->givePermissionTo(Permission::all());

        $staffRole->givePermissionTo([
            'access_dashboard',
            'manage_workout_packages',
            'manage_exercises',
            'manage_posts',
            'manage_comments',
            'customer_support',
        ]);
    }
}
