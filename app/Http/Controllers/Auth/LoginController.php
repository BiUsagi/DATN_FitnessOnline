<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\LoginRequest;

class LoginController extends Controller
{
    function index(){
        return view('frontend/layouts/auth/login');
    }

    public function login_(LoginRequest $request)
    {
        $t = new User();
        $t->email = $request->email;
        $t->password = $request->password;

        // Lưu thông tin vào cơ sở dữ liệu
        $t->save();
        return redirect()->route('login.index');
    }

    public function register(LoginRequest $request)
    {
        $t = new User();
        $t->email = $request->email;

        // Lưu thông tin vào cơ sở dữ liệu
        $t->save();   
        return redirect()->route('login.index');
    }
}