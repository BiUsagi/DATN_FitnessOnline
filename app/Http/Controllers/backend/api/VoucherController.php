<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\VoucherRequest;
use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(){
        $voucher = voucher::all();
        return response()->json($voucher);
    }

    public function show($id){
        $voucher = voucher::find($id);
        return response()->json($voucher);
    }

    public function add(VoucherRequest $request){
        $vouchers = new voucher();
        $vouchers->code = $request->input('code');
        $vouchers->sale = $request->input('sale');
        $vouchers->usage_limit = $request->input('usage_limit');
        $vouchers->start_date = $request->input('startday');
        $vouchers->end_date = $request->input('endday');
        $vouchers->save();
        return response()->json($vouchers);
    }

    public function delete($id){
        $voucher = voucher::find($id);
        $voucher->delete();
        return response()->json($voucher);
    }

    public function update($id, VoucherRequest $request){
        $vouchers = voucher::find($id);
        $vouchers->code = $request->input('code_modal');
        $vouchers->sale = $request->input('sale_modal');
        $vouchers->usage_limit = $request->input('usage_limit_modal');
        $vouchers->start_date = $request->input('startday_modal');
        $vouchers->end_date = $request->input('endday_modal');
        $vouchers->save();
        return response()->json($vouchers);
    }
}
