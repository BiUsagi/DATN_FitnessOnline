<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\AccountRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AccountsController extends Controller
{
    // tìm tài khoản theo id
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

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
}