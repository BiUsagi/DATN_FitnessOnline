<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Http\Requests\frontend\LoginRequest;
use App\Http\Requests\frontend\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function index()
    {
        return view('frontend/layouts/auth/login');
    }

    public function login_(LoginRequest $request)
    {
        // Tìm người dùng theo email
        $user = User::where('email', $request->email)->first();

        // Kiểm tra xem người dùng có tồn tại không và so sánh mật khẩu
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);
        }
        Auth::login($user);
        $redirectUrl = $request->input('redirect_url') ?? route('index');

        return response()->json([
            'success' => true,
            'redirect_url' => $redirectUrl
        ]);
    }


    public function register(RegisterRequest $request)
    {
        // Tạo người dùng mới
        $user = User::create([
            'user_name' => $request['user_name'],
            'email' => $request['email1'],
            'password' => bcrypt($request['password1']),
            'gender' => 2,
        ]);

        $user->assignRoleBasedOnField($user->id);


        // Tạo ví cho người dùng vừa đăng ký
        $wallet = new Wallet();
        $wallet->user_id = $user->id; // Lấy ID người dùng vừa tạo
        $wallet->balance = 0.00; // Số dư mặc định
        $wallet->currency = 'VND'; // Đơn vị tiền tệ mặc định
        $wallet->save();

        // Nếu đăng ký thành công
        return redirect()->route('login.index')->with('success', 'Đăng ký thành công!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }




}