<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use App\Models\GymPackage;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function index()
    {
        $all_package = GymPackage::orderBy('id','desc')->get();
        return response([
            'data' => $all_package
        ]);
    }
}
