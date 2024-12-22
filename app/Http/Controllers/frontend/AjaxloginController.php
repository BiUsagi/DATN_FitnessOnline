<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Validator;
use Illuminate\Support\Facades\Validator;

class AjaxloginController extends Controller
{
    
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, send a success response
            return response()->json(['success' => true, 'message' => 'Đăng nhập thành công!']);
            
        } else {
            // If unsuccessful, send an error response
            return response()->json(['success' => false, 'message' => 'Email hoặc mật khẩu không đúng.']);
        }
    }
}
