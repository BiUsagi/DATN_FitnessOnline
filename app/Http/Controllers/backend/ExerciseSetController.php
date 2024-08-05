<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExerciseSetController extends Controller
{
    public function index()
    {
        return view('backend/ExerciseSet/index');
    }

    public function create()
    {
        return view('backend/ExerciseSet/create');
    }
}