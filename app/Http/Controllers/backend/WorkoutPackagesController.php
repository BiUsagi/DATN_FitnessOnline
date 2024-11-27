<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;
use App\Models\Workout_Package;
use App\Models\Package_Exercise;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;




class WorkoutPackagesController extends Controller
{
    public function index(){

        $user = Auth::user();
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        if($user->role_012 === 2) {
            $data = Workout_Package::orderBy('id', 'asc')->get();
        }else {
            $data = Workout_Package::where('staff_id',$pt_id->id)->get();
        }   

        return view('backend/workout_package/index', ['workout'=>$data]);
    }

    public function detail($id){
        $package = Workout_Package::find($id);
        $user = Auth::user();
        $pt_id = Staff::where('user_id',Auth::user()->id)->first();
        $id = $pt_id->id;
        if (!$package) {
            return redirect()->back()->with('error', 'Không tìm thấy gói tập này!');
        }
        return view('backend.workout_package.detail', compact('package', 'user', 'id'));
    }

    public function create(){

        $pt_id = Staff::where('user_id',Auth::user()->id)->first();
        return view('backend/workout_package/create', ['pt_id'=>$pt_id]);
    }

    public function update($id)
    {   

        $pt_id = Staff::where('user_id',Auth::user()->id)->first();

        $update_id = Workout_package::find($id);
        return view('backend/workout_package/update', ['update_id' => $update_id, 'pt_id'=>$pt_id]);
    }

    public function delete($id)
    {
        $set = Workout_package::find($id);
        $set->delete();

        return redirect()->back();
    }
    
}
