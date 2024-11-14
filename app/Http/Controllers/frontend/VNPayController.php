<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function index(){
        return view('frontend/vnpay/index');
    }

    public function createpay(request $request){
        // dd($request->all());
        $data = $request;
        // echo $data['purchase_price'];

        return view('frontend/vnpay/index',compact('data'));
    }
}
