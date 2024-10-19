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
        $exercise->description = $request->input('description');
        $exercise->video_url = $request->input('exercise_id');
        // $exercise->equipment_needed = $request->input('equipment_needed');
        // $exercise->duration = $request->input('duration');

        $exercise->save();

        return response()->json($exercise);
    }
}