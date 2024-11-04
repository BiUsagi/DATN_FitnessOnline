<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\StaffRequest;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;

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
        return view('backend/accounts/info_staff', compact('data'));
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
        return view('backend/accounts/info_customer', compact('data', 'age'));
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




}