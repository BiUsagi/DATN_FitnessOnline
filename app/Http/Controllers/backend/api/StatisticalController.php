<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function revenue()
    {


        return view('backend/statistical/index', compact('customerData'));
    }
}
