<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;
use App\Models\Workout_Package;
use App\Models\Package_Exercise;
use Illuminate\Support\Facades\File;


class WorkoutPackagesController extends Controller
{
    public function index(){
        return view('backend/workout_package/index');
    }

    public function detail($id){
        $package = Workout_Package::find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('backend.workout_package.detail', compact('package'));
    }

    public function create(){
        return view('backend/workout_package/create');
    }

    public function update($id)
    {   
        $update_id = Workout_package::find($id);
        return view('backend/workout_package/update', ['update_id' => $update_id]);
    }

    public function delete($id)
    {
        $set = Workout_package::find($id);
        $set->delete();

        return redirect()->back();
    }

    public function workout_hub($id){
        $package = Workout_Package::find($id);
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('backend/workout_hub/index', compact('package'));
    }
}
