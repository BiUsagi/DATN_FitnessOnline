<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index(){
        $data = Exercise::orderBy('id', 'asc')->get();
        return response()->json($data) ;
    }

    public function add(Request $request){
        $exercise = new Exercise();
        $exercise->name = $request->input('exercise_name');
        $exercise->sets = $request->input('sets');
        $exercise->reps = $request->input('reps');
        $exercise->description = $request->input('description');
        $exercise->pt_id = $request->input('pt_id');
        $exercise->status = $request->input('exercise-status');
        if($request->hasFile('video_url')){
            $file = $request->file('video_url');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/video_exercise', $filename);
            $exercise->video_url = $filename;
        }
        

        $exercise->save();

        return response()->json($exercise);
    }
}