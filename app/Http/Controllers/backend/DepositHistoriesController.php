<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositHistoriesController extends Controller
{
    public function index(){
        return view('backend/deposit_histories/index');
    }

    public function list(){
        return view('backend/deposit_histories/list');
    }
}
