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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Thực hiện xác thực
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Đăng nhập thành công
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công!',
                'redirect' => route('home'), // Đường dẫn chuyển hướng
            ]);
        }

        // Nếu thông tin đăng nhập không chính xác
        return response()->json([
            'success' => false,
            'message' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function register_(LoginRequest $request)
    {
        $t = new User();
        $t->email = $request->email;
        $t->password = $request->password;


        // Lưu thông tin vào cơ sở dữ liệu
        $t->save();   
        return redirect()->route('login.index');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms' => 'accepted',
        ]);
    
        // Tạo người dùng
        $user = User::create([
            'user_name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    
        return response()->json(['success' => true, 'message' => 'Đăng ký thành công!']);
    }
    
}