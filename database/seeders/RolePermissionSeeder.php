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

        // Danh sách quyền
        $permissions = [
            // Truy cập Dashboard
            'dashboard' => ['access_dashboard'],
            // Quản lý tài khoản
            'account_management' => ['manage_account'],
            // Gói tập
            'workout_package_management' => ['view_package', 'create_package', 'edit_package', 'delete_package'],
            // Bài viết
            'post_management' => ['view_post', 'create_post', 'edit_post', 'delete_post'],
            // Bình luận
            'comment_management' => ['view_comment', 'restrict_comment'],
            // Bài tập
            'exercise_management' => ['view_exercise', 'create_exercise', 'edit_exercise', 'delete_exercise'],
            // Cấu hình
            'configuration' => ['manage_config'],
            // Đơn hàng
            'order_management' => ['manage_order'],
            // Thống kê
            'statistical' => ['view_statistical'],
            // Marketing
            'marketing' => ['manage_marketing'],
            // Slide
            'slide_management' => ['manage_slides'],
            // Hỗ trợ khách hàng
            'customer_support' => ['support_customer'],
            // Tìm bài tập
            'exercise_search' => ['search_exercise'],
            // thống kê
            'statistical_management' => ['manage_statistical'],
            // quản lý học viên 
            'student_management' => ['manage_student']
        ];

        foreach ($permissions as $group => $perms) {
            foreach ($perms as $permission) {
                Permission::firstOrCreate(['name' => $permission]);
            }
        }




        $adminPermissions = [
            'access_dashboard',
            'manage_account',
            'view_package',
            'delete_package',
            'view_post',
            'delete_post',
            'view_comment',
            'restrict_comment',
            'view_exercise',
            'manage_config',
            'manage_order',
            'view_statistical',
            'manage_marketing',
            'manage_slides',
            'search_exercise',
            'manage_statistical'
        ];
        $staffPermissions = [
            'view_post',
            'create_post',
            'edit_post',
            'delete_post',
            'view_package',
            'manage_student',
            'create_package',
            'edit_package',
            'delete_package',
            'view_exercise',
            'create_exercise',
            'edit_exercise',
            'delete_exercise',
            'support_customer',
            'search_exercise',
            'manage_statistical'
        ];

        $customerPermissions = [
            'search_exercise'
        ];


        // Gán quyền vào các vai trò
        $adminRole = Role::findByName('admin');
        $staffRole = Role::findByName('staff');
        $customerRole = Role::findByName('customer');


        $adminRole->syncPermissions($adminPermissions);
        $staffRole->syncPermissions($staffPermissions);
        $customerRole->syncPermissions($customerPermissions);
    }
}
