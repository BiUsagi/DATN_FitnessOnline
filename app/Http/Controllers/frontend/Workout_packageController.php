<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use Illuminate\Http\Request;

class Workout_packageController extends Controller
{
    public function workout_detail($id){
        $package = Workout_Package::find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('frontend/workout_package/workout_detail', compact( 'package'));
    }
}
