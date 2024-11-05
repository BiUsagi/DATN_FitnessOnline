<?php

namespace App\Http\Controllers\frontend\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Voucher_package;
use Carbon\Carbon;


class PayController extends Controller
{
    public function getVoucher($text = '')
    {
        // Lấy ngày hiện tại
        $currentDate = Carbon::now();

        // Tìm voucher theo điều kiện và thêm điều kiện cho end_date
        $voucher = $text === ''
            ? Voucher::where('end_date', '>', $currentDate)
                ->where('usage_limit', '>', 'times_used')
                ->get()
            : Voucher::where('code', 'like', '%' . $text . '%')
                ->where('end_date', '>', $currentDate)
                ->where('usage_limit', '>', 'times_used')
                ->get();


        return response()->json($voucher);
    }

    public function getVoucherCode($code)
    {
        $currentDate = Carbon::now();

        $voucher = Voucher::where('code', $code)
            ->where('end_date', '>', $currentDate)
            ->where('usage_limit', '>', 'times_used')
            ->first();

        return response()->json($voucher);
    }


    public function pay(Request $request)
    {
        $user_id = $request['user_id'];
        $workout_package_id = $request['workout_package_id'];
        $original_price = $request['original_price'];
        $purchase_price = $request['purchase_price'];
        $voucher_id = $request['voucher_id'];

        $record = Order::create([
            'user_id' => $user_id,
            'workout_package_id' => $workout_package_id,
            'original_price' => $original_price,
            'purchase_price' => $purchase_price,
            'voucher_id' => $voucher_id, // Có thể null
        ]);

        if ($request->has('voucher_id') && $request->filled('voucher_id')) {
            $voucherP = Voucher_package::create([
                'workout_package_id' => $workout_package_id,
                'user_id' => $user_id,
                'voucher_id' => $voucher_id,
            ]);
        }

        $wallet = Wallet::where('user_id',$user_id)->first();
        $wallet->balance -= $purchase_price;
        $wallet->save();



        return response()->json();
    }
}
