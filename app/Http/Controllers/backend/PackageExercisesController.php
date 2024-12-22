<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package_Exercise;
use App\Models\Exercise;
use Illuminate\Http\Request;


class PackageExercisesController extends Controller
{
    
    public function index(){
        return view('backend/package_exercise/index');
    }

    public function detail(){
        return view('backend/package_exercise/detail');
    }
}
