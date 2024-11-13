<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class ProfileController extends Controller
{
    public function profile(){
        return view('frontend/profile');
    }

    public function updateprofile(){
        
    }

    // Hiển thị form chỉnh sửa thông tin
    public function edit()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập
        return view('profile.edit', compact('user'));
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate dữ liệu
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
        ]);

        // Cập nhật thông tin
        $user->user_name = $request->input('fullname');
        $user->phone_number = $request->input('phone');
        $user->birthday = $request->input('dob');
        $user->gender = $request->input('gender');
        
        // Lưu thay đổi vào cơ sở dữ liệu
        $user->save();

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công.');
    }
}
