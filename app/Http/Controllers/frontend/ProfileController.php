<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Staff;
use App\Models\Workout_Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend/profile/profile');
    }




    public function trainers()
    {
        $data = Staff::paginate(8);
        return view('frontend/profile/trainers', compact('data'));
    }

    public function info_trainer($id)
    {
        $data = Staff::find($id);
        $workout_packages = Workout_Package::where('staff_id', $id)->get();
        $students = Staff::find($id)->getStudentsByStaff($id);
        $posts = Posts::where('staff_id', $id)->get();
        return view('frontend/profile/info_trainer', compact('data', 'workout_packages', 'students', 'posts'));
    }
    public function staff_request()
    {
        $data = User::find(Auth::id());
        return view('frontend/profile/staff_request', compact('data'));
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
