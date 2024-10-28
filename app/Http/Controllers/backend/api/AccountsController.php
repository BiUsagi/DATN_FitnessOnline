<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\AccountRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AccountsController extends Controller
{
    // tìm tài khoản theo id
    public function showU($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function updateU(Request $request, $id)
    {
        // Tìm người dùng theo ID
        $user = User::find($id);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Cập nhật thông tin người dùng
        $user->user_name = $request->input('user_name');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');
        $user->save();

        // Trả về phản hồi JSON chứa thông tin người dùng sau khi cập nhật
        return response()->json($user);
    }

    public function showS($id)
    {
        $staff = Staff::find($id);
        return response()->json($staff);
    }

    public function updateS($id, Request $request)
    {

        $staff = Staff::find($id);

        // Cập nhật thông tin người dùng
        $staff->staff_name = $request->input('staff_name');
        $staff->gender = $request->input('staff_gender');
        $staff->email = $request->input('staff_email');
        $staff->phone_number = $request->input('staff_phone');
        $staff->address = $request->input('staff_address');
        $staff->birthday = $request->input('staff_birthday');
        $staff->introduction = $request->input('description');


        if ($request->hasFile('avatar')) {

            // Đường dẫn đến thư mục ảnh
            $imagePath = 'assets/backend/img/accounts/';

            // Kiểm tra và xóa ảnh cũ
            if ($staff->avatar && file_exists(public_path($imagePath . $staff->avatar))) {
                unlink(public_path($imagePath . $staff->avatar));
            }


            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/backend/img/accounts', $filename);
            $staff->avatar = $filename;
        }



        $staff->save();

        return response()->json($staff);
    }
}