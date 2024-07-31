<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index()
    {
        return view('backend/statistical/index');
    }
}