<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('backend/Exercise/index');
    }

    public function add(Request $request){
        $exercise = new Exercise();
        $exercise->name_exercise = $request->input('exercise-name');
        $exercise->video_exercise = $request->input('exercise-id');
        $exercise->description = $request->input('exercise-description');
        // $exercise->exercise_status = $request->input('exercise-status');
        $exercise->save();
        toastr()->success('Thêm bài tập thành công!');
        return redirect()->back();
    }


    public function store(Request $request){
        echo "add exercise";
    }

    public function createExercise()
    {
        return view('backend/Exercise/create');
    }
}