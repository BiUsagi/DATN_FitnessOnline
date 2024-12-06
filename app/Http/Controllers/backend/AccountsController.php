<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StaffRequest;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use App\Models\Workout_Package;
use Spatie\Permission\Models\Role;
class AccountsController extends Controller
{
    // trang nhân viên
    public function staff_account()
    {
        $data = Staff::all();
        return view('backend/accounts/staff_accounts', compact('data'));
    }
    public function staff_info($id)
    {
        $data = Staff::where('id', $id)->first();
        $workout_packages = Workout_Package::where('staff_id', $id)->get();
        return view('backend/accounts/info_staff', compact('data', 'workout_packages'));
    }
    public function staff_update($id)
    {
        $staffId = $id;
        return view('backend/accounts/update_staff', compact('staffId'));
    }



    // trang tài khoản
    public function customer_account()
    {
        $data = User::all();
        // Tính tuổi cho từng tài khoản
        foreach ($data as $user) {
            $user->age = $user->getAgeFromBirthday();
        }
        return view('backend/accounts/customer_accounts', compact('data'));
    }

    // trang chi tiết tài khoản
    public function customer_info($id)
    {
        $data = User::where('id', $id)->first();
        $age = $data->getAgeFromBirthday();
        $workout_packages = User::where('id', $id)
            ->with(['orders.workoutPackage'])
            ->first();
        return view('backend/accounts/info_customer', compact('data', 'age', 'workout_packages'));
    }



    // Trang đơn đăng ký
    public function application()
    {
        $data = StaffRequest::orderBy('status', 'asc')->get();
        return view('backend/accounts/staff_requests', compact('data'));
    }
    public function application_info($id)
    {
        $staff = StaffRequest::where('id', $id)->first();
        $user = User::where('id', $staff->user_id)->first();
        return view('backend/accounts/info_staff_requests', compact('staff', 'user'));
    }



    /**
     * Gán vai trò cho người dùng 
     */
    public function assignRoleBasedOnField($userId)
    {
        // Tìm user theo ID
        $user = User::findOrFail($userId);

        // Kiểm tra giá trị của `role` và gán vai trò tương ứng
        switch ($user->role_012) {
            case 0:
                $user->assignRole('customer');
                break;
            case 1:
                $user->assignRole('staff');
                break;
            case 2:
                $user->assignRole('admin');
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Vai trò không hợp lệ.']);
        }

        return response()->json(['success' => true, 'message' => 'Vai trò đã được gán cho user.']);
    }




    public function approve($id)
    {
        $staffRequest = StaffRequest::findOrFail($id);
        $staffRequest->status = 1;
        $staffRequest->approved_at = now();
        $staffRequest->save();


        // Chuyển dữ liệu từ staff_requests sang bảng staff
        $staff = new Staff();
        $staff->user_id = $staffRequest->user_id;
        $staff->staff_name = $staffRequest->new_name ?? $staffRequest->user->user_name;
        $staff->email = $staffRequest->new_email;
        $staff->avatar = $staffRequest->new_avatar ?? $staffRequest->user->avatar;
        $staff->gender = $staffRequest->user->gender;
        $staff->birthday = $staffRequest->user->birthday;
        $staff->introduction = $staffRequest->introduction;
        $staff->address = $staffRequest->new_address;
        $staff->phone_number = $staffRequest->new_phone_number;
        $staff->created_at = now();
        $staff->save();


        $staff->assignRole('staff');

        return redirect()->route('admin.application');
    }
}