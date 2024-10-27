<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Workout_Package;
use Illuminate\Http\Request;

class Workout_PackageController extends Controller
{
    public function index(){
        $data = Workout_Package::orderBy('id', 'asc')->get();
        return response()->json($data) ;
    }

    public function workout_detail($id){
        $details = Workout_Package::find($id);

        return response()->json($details) ;
    }

    public function create_(Request $request)
    {
        $set = new Workout_package;
        $set->package_name = $request->input('package_name');
        $set->price = $request->input('price');
        $set->description = $request->input('description');
        // $set->staff_id = $request->input('staff_id');
        $set->level = $request->input('level');
        $set->status = $request->input('status');
        $set->duration_days = $request->input('duration_days');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //lay ten mo rong png, jpg, ..
            $filename = time().'.'.$extension;
            $file->move('uploads/gym_package', $filename);
            $set->image = $filename;
        }

        $set->save();
        return response()->json($set);
      
    }

    // public function add(Request $request){
    //     $exercise = new Exercise();
    //     $exercise->exercise_name = $request->input('exercise_name');
    //     $exercise->description = $request->input('description');
    //     $exercise->video_url = $request->input('exercise_id');
    //     $exercise->equipment_needed = $request->input('equipment_needed');
    //     $exercise->duration = $request->input('duration');

    //     $exercise->save();

    //     return response()->json($exercise);
    // }
}