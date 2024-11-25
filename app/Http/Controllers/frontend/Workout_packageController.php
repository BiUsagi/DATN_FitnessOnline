<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use App\Models\Order;
use App\Models\user_videos;
use Illuminate\Http\Request;

class Workout_packageController extends Controller
{
    public function workout_detail($id){
        $package = Workout_Package::with('staff')->find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('frontend/workout_package/workout_detail', compact( 'package'));
    }

    public function workout_bought($user_id){
        $workouts = Order::where('user_id', $user_id)->with('workoutPackage.staff')->get();
        return view('frontend/workout_package/workout_bought', compact( 'workouts'));
    }

    public function workout_hub($id) {
        $package = Workout_Package::with('userPackageProgress')->find($id);
    
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
    
        $progress = $package->userPackageProgress()->where('user_id', auth()->id())->first(); 
    
        if (!$progress) {
            $progress = null;
        }
    
        $orders = Order::where('workout_package_id', $id)
                        ->with('user') 
                        ->get();
    
        return view('frontend.workout_hub.index', compact('package', 'progress', 'orders'));
    }
    
    public function submit_exercise($workout_id, $user_id)
    {
        $userUpload = User_Videos::where('user_id', $user_id)
        ->where('workout_package_id', $workout_id)
        ->orderBy('day_number')
        ->get();
    
        $workoutPackage = Workout_Package::find($workout_id);
    
        $daysStatus = [];
        for ($day = 1; $day <= $workoutPackage->duration_days; $day++) {
            $video = $userUpload->firstWhere('day_number', $day);
            $daysStatus[$day] = $video ? $video->status : 0;
        }

    return view('frontend.submit_exercise.index', compact('userUpload', 'workoutPackage', 'daysStatus'));
    }
    
    
}
