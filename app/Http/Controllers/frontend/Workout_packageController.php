<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use App\Models\Order;
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
    
        // $userProgress = $package->userPackageProgress->keyBy('current_day'); 
        // $currentDay = $userProgress->max('current_day'); 
    
        return view('frontend.workout_hub.index', compact('package'));
    }

    public function submit_exercise(){
        
        return view('frontend.submit_exercise.index');
    }
}
