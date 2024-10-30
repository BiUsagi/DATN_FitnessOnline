<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index(){
        return view('backend/wallets/index');
    }

    public function list(){
        
    }
}
