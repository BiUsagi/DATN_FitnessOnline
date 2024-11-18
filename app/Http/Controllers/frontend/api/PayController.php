<?php

namespace App\Http\Controllers\frontend\api;
use Illuminate\Support\Facades\Cache;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Voucher;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Voucher_package;
use Carbon\Carbon;
use Psy\Readline\Hoa\Console;


class PayController extends Controller
{
    public function getVoucher(Request $request)
    {
        $user_id = $request['user_id'];
        $text = $request['text'];

        // Lấy danh sách voucher đã sử dụng của người dùng
        $voucherP = Voucher_package::where('user_id', $user_id)->pluck('voucher_id')->toArray(); // Lấy chỉ cột voucher_id

        // Lấy ngày hiện tại
        $currentDate = Carbon::now();

        // Tìm voucher theo điều kiện và thêm điều kiện cho end_date
        $voucher = $text === ''
            ? Voucher::where('end_date', '>', $currentDate)
                ->where('usage_limit', '>', 'times_used')
                ->whereNotIn('id', $voucherP) // Loại bỏ những voucher đã tồn tại
                ->get()
            : Voucher::where('code', 'like', '%' . $text . '%')
                ->where('end_date', '>', $currentDate)
                ->where('usage_limit', '>', 'times_used')
                ->whereNotIn('id', $voucherP) // Loại bỏ những voucher đã tồn tại
                ->get();

        return response()->json($voucher);
    }


    public function getVoucherCode(Request $request)
    {
        $user_id = $request['user_id'];
        $voucherP = Voucher_package::where('user_id', $user_id)->pluck('voucher_id')->toArray(); // Lấy chỉ cột voucher_id

        $code = $request['code'];
        $currentDate = Carbon::now();

        // Tìm voucher theo code
        $voucher = Voucher::where('code', $code)
            ->where('end_date', '>', $currentDate)
            ->where('usage_limit', '>', 'times_used')
            ->first();

        // Kiểm tra voucher
        if (is_null($voucher)) {
            return response()->json(['message' => 'Mã không chính xác.'], 404);
        }

        // Kiểm tra xem voucher đã được sử dụng hay chưa
        if (in_array($voucher->id, $voucherP)) {
            return response()->json(['message' => 'Mã đã được sử dụng.'], 409);
        }

        // Nếu voucher hợp lệ và chưa được sử dụng
        return response()->json($voucher);
    }



    public function pay()
    {
        $data = Cache::get('order_data');

        $user_id = $data['user_id'];
        $workout_package_id = $data['workout_package_id'];
        $original_price = $data['original_price'];
        $purchase_price = $data['purchase_price'];
        $voucher_id = $data['voucher_id'];


        // $wallet = Wallet::where('user_id', $user_id)->first();
        // if ($wallet->balance < $purchase_price) {
        //     return response()->json(['error' => 'Số dư trong ví không đủ để thực hiện giao dịch.'], 400);
        // } else {

        //     $record = Order::create([
        //         'user_id' => $user_id,
        //         'workout_package_id' => $workout_package_id,
        //         'original_price' => $original_price,
        //         'purchase_price' => $purchase_price,
        //         'voucher_id' => $voucher_id, // Có thể null
        //     ]);

        //     if ($request->has('voucher_id') && $request->filled('voucher_id')) {
        //         $voucherP = Voucher_package::create([
        //             'workout_package_id' => $workout_package_id,
        //             'user_id' => $user_id,
        //             'voucher_id' => $voucher_id,
        //         ]);
        //     }

        //     $wallet = Wallet::where('user_id', $user_id)->first();
        //     $wallet->balance -= $purchase_price;
        //     $wallet->save();

        //     return redirect()->back()->with('success', 'Mua thành công!');
        // }



        $checkOrder = Order::where('user_id', $user_id)->where('workout_package_id', $workout_package_id)->first();
        if (empty($checkOrder)) {
            $record = Order::create([
                'user_id' => $user_id,
                'workout_package_id' => $workout_package_id,
                'original_price' => $original_price,
                'purchase_price' => $purchase_price,
                'voucher_id' => $voucher_id, // Có thể null
            ]);

            if ($voucher_id) {
                $voucherP = Voucher_package::create([
                    'workout_package_id' => $workout_package_id,
                    'user_id' => $user_id,
                    'voucher_id' => $voucher_id,
                ]);
            }

            return response()->json([
                'message' => 'Tạo đơn hàng thành công',
                'data' => $record
            ]);


        } else {
            return response()->json(['message' => 'Đơn hàng đã tồn tại.']);
        }

    }


    public function checkorder(request $request)
    {
        $user_id = $request['user_id'];
        $workout_package_id = $request['workout_package_id'];
        $data = Order::where('user_id', $user_id)->where('workout_package_id', $workout_package_id)->first();
        return response()->json($data);
    }

    public function checkwallet(request $request)
    {
        $user_id = $request['user_id'];
        $wallet = Wallet::where('user_id', $user_id)->first();
        return response()->json($wallet);
    }
}
