<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend/profile/profile');
    }




    public function trainers()
    {
        $data = Staff::paginate(8);
        return view('frontend/profile/trainers', compact('data'));
    }

    public function info_trainer($id)
    {
        $data = Staff::find($id);
        return view('frontend/profile/info_trainer', compact('data'));
    }
    public function staff_request()
    {
        $data = User::find(Auth::id());
        return view('frontend/profile/staff_request', compact('data'));
    }
}
