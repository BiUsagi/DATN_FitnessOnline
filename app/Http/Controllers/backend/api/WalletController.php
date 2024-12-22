<?php

namespace App\Http\Controllers\backend\api;

use App\Http\Controllers\Controller;
use App\Models\Deposit_histories;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    public function wallet($id)
    {
        $data = Wallet::where('id', $id)->first();
        return response()->json($data);
    }
    
    public function addmoney($id, $dong)
    {
        $his = Deposit_histories::find($id);

        // Kiểm tra xem $dong có phải là số nguyên dương không
        if (!is_numeric($dong) || $dong <= 0) {
            return response()->json(['error' => 'Invalid amount.'], 400);
        }

        // Tìm ví tiền theo ID
        $wallet = Wallet::find($his->wallet_id);

        // Kiểm tra xem ví tiền có tồn tại không
        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found.'], 404);
        }

        // Cập nhật số dư
        $wallet->balance += $dong;

        // Lưu lại thay đổi
        $wallet->save();

        return response()->json($wallet);
    }

    public function walletbyuser($id)
    {
        $data = Wallet::where('user_id', $id)->first();
        return response()->json($data);
    }

}
