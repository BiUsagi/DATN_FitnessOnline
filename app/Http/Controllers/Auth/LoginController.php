<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // function index() {
    //     return view('frontend/layouts/auth/login');
    // }
    function login_(Request $request){
        $request->validate([
            'email' => 'required',
            'pass' => 'required'
        ],[
            'email.required' => 'Email không được để trống',
            'pass.required' => 'Mật khẩu không được để trống'
        ]);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
        }
        $user = User::where('email', $email)->first();
 
    }
}