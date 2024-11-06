<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend/profile/profile');
    }



    public function staff_request()
    {
        $data = User::find(Auth::id());
        return view('frontend/profile/staff_request', compact('data'));
    }
}
