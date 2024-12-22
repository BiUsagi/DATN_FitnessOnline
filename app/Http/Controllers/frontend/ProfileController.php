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
use Illuminate\Support\Facades\File;




class ProfileController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id); // Tìm người dùng dựa trên ID
        return view('frontend/profile/profile', compact('user'));
    }

    // Hiển thị form chỉnh sửa thông tin
    public function edit()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đang đăng nhập
        return view('frontend.profile.edit_user', compact('user'));
    }

    public function edit_(Request $request)
    {
        // Lấy thông tin người dùng đã đăng nhập

        $user_id = $request->user_id;
        $user = User::findOrFail($user_id); // Tìm người dùng dựa trên ID


        // Validate dữ liệu (nếu cần thiết)
        $request->validate([
            'hoten' => 'required|string|max:255',
            'ngaysinh' => 'required|date',
            'address' => 'required|string|max:255',
            'staff_gender' => 'required|in:0,1,2',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Cập nhật các thông tin người dùng
        $user->user_name = $request->hoten;
        $user->gender = $request->staff_gender;
        $user->phone_number = $request->sdt;
        $user->birthday = $request->ngaysinh;
        $user->address = $request->address;
        // $user->avatar = $request->hinhanh;

        // Xử lý ảnh mới nếu có
        if ($request->hasFile('hinhanh')) {

            $old_image = 'assets/backend/img/accounts' . $user->avatar;
            if (file::exists($old_image)) {
                file::delete($old_image);
            }

            $file = $request->file('hinhanh');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time() . '.' . $extension;
            $file->move('assets/backend/img/accounts', $filename);
            $user->avatar = $filename;
        }

        // Lưu thông tin người dùng
        $user->save();
        return redirect()->route('profile.index', ['id' => Auth::user()->id])->with('success', 'Thông tin đã được cập nhật!');
    }

    public function changePassword($id)
    {
        $user = User::findOrFail($id);
        return view('frontend.profile.changepassword', compact('user'));
    }

    public function changePassword_(Request $request, $id)
    {
        $user = User::findOrFail($id); // Tìm người dùng dựa trên ID

        // Validate dữ liệu từ form
        $request->validate([
            'pass' => 'required|string', // Mật khẩu cũ là bắt buộc
            'newpass' => 'required|string|min:8|confirmed', // Mật khẩu mới yêu cầu dài ít nhất 8 ký tự và xác nhận mật khẩu
        ]);

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->input('pass'), $user->password)) {
            return back()->withErrors(['pass' => 'Mật khẩu cũ không chính xác.']); // Trả về thông báo lỗi nếu mật khẩu cũ không đúng
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->input('newpass')); // Mã hóa mật khẩu mới trước khi lưu
        $user->save();

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công!'); // Trả về thông báo thành công
    
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
}
