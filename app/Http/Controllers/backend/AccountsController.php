<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
    // trang tài khoản
    public function customer_account()
    {
        $data = User::all();
        return view('backend/accounts/customer_accounts', compact('data'));
    }

    // trang chi tiết tài khoản
    public function customer_info($id)
    {
        $data = User::where('id', $id)->first();
        return view('backend/accounts/info_customer', compact('data'));
    }

    // tìm tài khoản theo id
    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    // cập nhật tài khoản
    public function updateUser(Request $request)
    {


        // Xác thực dữ liệu
        $request->validate([
            'user_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
        ]);

        // Tìm người dùng theo ID và cập nhật thông tin
        $user = User::find($request->id);
        if ($user) {
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address; // Cập nhật địa chỉ nếu cần
            $user->save();

            // Trả về dữ liệu người dùng đã cập nhật
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }
}