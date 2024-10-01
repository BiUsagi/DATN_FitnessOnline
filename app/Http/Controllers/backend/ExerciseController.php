<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('backend/Exercise/index');
    }

    public function store(Request $request){
        echo "add exercise";
    }

    public function createExercise()
    {
        return view('backend/Exercise/create');
    }
}