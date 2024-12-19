<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CustomerRequest;
use App\Models\Staff;
use App\Models\StaffRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;


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
        $staff->email = $staffRequest->new_email ?? $staffRequest->user->email;
        $staff->avatar = $staffRequest->new_avatar ?? $staffRequest->user->avatar;
        $staff->gender = $staffRequest->user->gender;
        $staff->birthday = $staffRequest->user->birthday;
        $staff->introduction = $staffRequest->introduction;
        $staff->address = $staffRequest->new_address ?? $staffRequest->user->address;
        $staff->phone_number = $staffRequest->new_phone_number ?? $staffRequest->user->phone_number;
        $staff->created_at = now();
        $staff->save();

        $user = User::findOrFail($staffRequest->user_id);
        // $user->assignRole(['staff'], 'web');
        $user->role_012 = 1;
        $user->save();
        $user->assignRole(['staff']);

        return response()->json(['success' => true, 'message' => 'Yêu cầu đã được phê duyệt.']);
    }

    public function reject($id)
    {
        $staffRequest = StaffRequest::findOrFail($id);
        $staffRequest->status = 2;
        $staffRequest->approved_at = now();
        $staffRequest->save();

        return response()->json(['success' => true, 'message' => 'Yêu cầu đã bị từ chối.']);
    }


    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $userId = $request->user_id;


        $exists = User::where('email', $email)
            ->where('id', '!=', $userId) // Loại trừ người dùng hiện tại
            ->exists();

        return response()->json([
            'unique' => !$exists, // unique = true nếu email chưa tồn tại
        ]);
    }


    public function staffCheckEmail(Request $request)
    {
        $email = $request->get('email');
        $exists = Staff::where('email', $email)->exists();

        return response()->json([
            'isUnique' => !$exists
        ]);
    }
}