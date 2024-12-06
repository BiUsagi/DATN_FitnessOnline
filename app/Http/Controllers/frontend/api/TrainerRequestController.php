<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StaffRequest;
use App\Models\User;


class TrainerRequestController extends Controller
{
    public function store(Request $request, $userId)
    {
        $user = User::find($userId);

        $staff = new StaffRequest();
        $staff->user_id = $user->id;
        $staff->new_name = $request->name ?? $user->user_name;
        $staff->new_email = $request->email ?? $user->email;
        $staff->new_address = $request->address ?? $user->address;
        $staff->new_phone_number = $request->phonenumber ?? $user->phone_number;
        $staff->introduction = $request->introduction ?? null;
        // $staff->new_avatar = $imageName ?? $user->avatar;
        // $staff->certificate = $cvName;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/backend/img/accounts', $filename);
            $staff->new_avatar = $filename; // Lưu tên file vào database
        } else {
            $staff->new_avatar = $user->avatar;
        }

        if ($request->hasFile('file-up')) {
            $file = $request->file('file-up');
            $cvName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/cv_resume', $cvName);
            $staff->certificate = $cvName; // Lưu tên file vào database
        }
        $staff->save();

        return response()->json([
            'message' => 'Đăng ký huấn luyện viên thành công!',
        ], 200);
    }
}
