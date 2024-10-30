<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\Deposit_histories;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    public function index($id)
    {
        $data = Wallet::where('user_id', $id)->first();
        return response()->json($data);
    }

    public function requestbill(Request $request){
        $depositHistory = Deposit_histories::create([
            'wallet_id' => $request->money,
        ]);
    }


}
