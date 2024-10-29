<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    public function addmoney(){
        return view('frontend/wallets/addmoney');
    }
}
