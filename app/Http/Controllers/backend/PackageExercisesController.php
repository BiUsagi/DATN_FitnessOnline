<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package_Exercise;
use Illuminate\Http\Request;


class PackageExercisesController extends Controller
{
    public function index(){
        return view('backend/ExerciseSet/create');
    }
}
