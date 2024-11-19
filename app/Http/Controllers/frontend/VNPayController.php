<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VNPayController extends Controller
{
    public function index()
    {
        return view('frontend/vnpay/index');
    }

    public function createpay(request $request)
    {
        // dd($request->all());
        $data = $request;
        // echo $data['purchase_price'];

        return view('frontend/vnpay/index', compact('data'));
    }


    public function createpayment(request $request)
    {
        // dd($request->all());
        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $request['amount']; // Số tiền thanh toán
        $vnp_Locale = $request['language']; //Ngôn ngữ chuyển hướng thanh toán
        $vnp_BankCode = $request['bankCode']; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('vnp_TmnCode'),
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            // "vnp_OrderInfo" => "Thanh toan GD:" + $vnp_TxnRef,
            "vnp_OrderInfo" => "Thanh toan GD:",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => route('payment.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
            // "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('vnp_Url') . "?" . $query;
        if (env('vnp_HashSecret')) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, env('vnp_HashSecret'));//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        //lay thong tin request
        $original_price = $request['original_price']; 
        $purchase_price = $request['purchase_price']; 
        $voucher_id = $request['voucher_id']; 
        $user_id = $request['user_id']; 
        $workout_package_id = $request['workout_package_id']; 


        //luu order vào cache
        $orderData = [
            'original_price' => $original_price,
            'purchase_price' => $purchase_price,
            'voucher_id' => $voucher_id,
            'user_id' => $user_id,
            'workout_package_id' => $workout_package_id
        ];

        // Xóa order cũ nếu có
        Cache::forget('order_data');

        // Lưu order mới vào cache
        Cache::put('order_data', $orderData, now()->addMinutes(30));
        // dd(Cache::get('order_data'));

        header('Location: ' . $vnp_Url);
        die();
    }

    public function vnpayReturn(request $request)
    {
        // dd($request->all());
        return view('frontend/vnpay/vnpay_return');
    }
}
