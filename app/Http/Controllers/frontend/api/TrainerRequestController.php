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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/assets/backend/img/accounts');
            $imageUrl = asset($image->hashName());
        } else {
            $imageUrl = null;
        }


        if ($request->hasFile('file-up')) {
            $cv = $request->file('file-up');
            // Lưu vào storage/app/public/certificates
            $cvPath = $cv->store('public/upload/cv_resume');
            $cvUrl = asset($cv->hashName());
        } else {
            $cvUrl = null;
        }

        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'Người dùng không tồn tại hoặc chưa đăng nhập'], 404);
        }
        $staff = new StaffRequest();
        $staff->user_id = $user->id;
        $staff->new_name = $request->name ?? $user->user_name;
        $staff->new_email = $request->email ?? $user->email;
        $staff->new_address = $request->address ?? $user->address;
        $staff->new_phone_number = $request->phonenumber ?? $user->phone_number;
        $staff->introduction = $request->introduction ?? null;
        $staff->new_avatar = $imageUrl;
        $staff->certificate = $cvUrl;
        $staff->save();

        return response()->json([
            'message' => 'Đăng ký huấn luyện viên thành công!',
        ], 201);
    }
}
