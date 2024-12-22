<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\Deposit_histories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WalletsController extends Controller
{
    public function index($id)
    {
        $data = Wallet::where('user_id', $id)->first();
        return response()->json($data);
    }

    public function generateUniqueTransactionId()
    {
        do {
            $transaction_id = strtoupper(Str::random(10)); // Tạo chuỗi ngẫu nhiên 10 ký tự
        } while (Deposit_histories::where('transaction_id', $transaction_id)->exists()); // Kiểm tra nếu đã tồn tại

        return $transaction_id;
    }

    public function requestbill(Request $request)
    {
        $wallet_id = $request->wallet_id;
        $wallet = Wallet::find($wallet_id);
        $amount = $request->amount;

        $wallet->balance -= $amount;
        $wallet->save();

        $transaction_id = $this->generateUniqueTransactionId();
        $depositHistory = Deposit_histories::create([
            'wallet_id' => $request->wallet_id,
            'user_id' => $request->user_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'transaction_id' => $transaction_id,
            'deposited_at' => now(),
        ]);
        return response()->json($depositHistory);
    }


}
