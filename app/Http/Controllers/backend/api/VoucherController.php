<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(){
        $voucher = voucher::all();
        return response()->json($voucher);
    }
}
