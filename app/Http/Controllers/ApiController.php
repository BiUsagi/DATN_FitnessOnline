<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Models\Exercise;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function index()
    {
        $all_package = Exercise::orderBy('id','desc')->get();
        return response([
            'data' => $all_package
        ]);
    }
}
