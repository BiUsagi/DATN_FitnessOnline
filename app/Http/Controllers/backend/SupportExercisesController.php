<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support_Exercise;

class SupportExercisesController extends Controller
{
    public function index()
    {
        return view('backend.supportExercises.index');
    }


}