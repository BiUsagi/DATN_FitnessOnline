<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function index(){
        return view('frontend/layouts/auth/login');
    }

    public function login_(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tìm người dùng theo email
    $user = User::where('email', $validated['email'])->first();

    // Kiểm tra xem người dùng có tồn tại không và so sánh mật khẩu
    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);
    }

    // Nếu đăng nhập thành công
    return response()->json(['message' => 'Đăng nhập thành công']);
}

public function register(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $validated = $request->validate([
        'user_name' => 'required|string|max:255',
        'email1' => 'required|email|unique:users,email',
        'password1' => 'required|string|min:8|confirmed',
    ]);

    // Tạo người dùng mới
    $user = User::create(attributes: [
        'user_name' => $validated['user_name'],
        'email' => $validated['email1'], // Đảm bảo sử dụng email1
        'password' => bcrypt($validated['password1']), // Đảm bảo sử dụng password1
    ]);

    // Nếu đăng ký thành công
    return response()->json(['message' => 'Đăng ký thành công'], 201);
}



    
}