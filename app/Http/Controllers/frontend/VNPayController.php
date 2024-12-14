<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Cache;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Models\Staff;
use App\Models\Wallet;
use App\Models\Workout_Package;

class VNPayController extends Controller
{
    public function test(){
        $data = Cache::get('order_data');

        $user_id = $data['user_id'];
        $workout_package_id = $data['workout_package_id'];
        $original_price = $data['original_price'];
        $purchase_price = $data['purchase_price'];
        $voucher_id = $data['voucher_id'];

        $workout_package = Workout_Package::find($workout_package_id);
        $staff = Staff::find($workout_package->staff_id);
        $user_pt = User::find($staff->user_id);
        $wallet_pt = Wallet::where('user_id', $user_pt->id)->first();

        echo $wallet_pt;
    }
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

        $user = User::find($user_id);
        $user_name = $user->user_name;

        $workout_package = Workout_Package::find($workout_package_id);
        $workout_package_name = $workout_package->package_name;
        $staff_id = $workout_package->staff_id;
        $staff = Staff::find($staff_id);
        $staff_uid = $staff->user_id;
        $staff_name = $staff->staff_name;


        //luu order vào cache
        $orderData = [
            'original_price' => $original_price,
            'purchase_price' => $purchase_price,
            'voucher_id' => $voucher_id,
            'user_id' => $user_id,
            'workout_package_id' => $workout_package_id,
            'workout_package_name' => $workout_package_name,
            'staff_uid' => $staff_uid,
            'staff_name' => $staff_name,
            'user_name' => $user_name
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

        // Lấy dữ liệu từ request
        $data = $request->only([
            'vnp_Amount',
            'vnp_BankCode',
            'vnp_BankTranNo',
            'vnp_CardType',
            'vnp_OrderInfo',
            'vnp_PayDate',
            'vnp_ResponseCode',
            'vnp_TmnCode',
            'vnp_TransactionNo',
            'vnp_TransactionStatus',
            'vnp_TxnRef',
            'vnp_SecureHash',
        ]);

        // Lưu vào cache với thời gian tùy chọn (ở đây là 60 phút)
        Cache::put('vnpay_data', $data, now()->addMinutes(60));

        // $this->sendmail();
        return view('frontend/vnpay/vnpay_return');
    }

    public function sendmail()
    {
        // Lấy dữ liệu order từ cache
        $orderData = Cache::get('order_data');
        if (!$orderData) {
            return 'Không có dữ liệu order trong cache';
        }

        // Lấy dữ liệu VNPay từ cache
        $vnpayData = Cache::get('vnpay_data');
        if (!$vnpayData) {
            return 'Không có dữ liệu VNPay trong cache';
        }

        // Lấy thông tin liên quan từ database
        $user = User::find($orderData['user_id']);
        if (!$user) {
            return 'Không tìm thấy người dùng';
        }

        $workoutPackage = Workout_Package::find($orderData['workout_package_id']);
        if (!$workoutPackage) {
            return 'Không tìm thấy gói tập';
        }

        // Chuẩn bị dữ liệu cho email
        $m_user_name = $user->user_name;
        $m_user_mail = $user->email;
        $m_workout_package_name = $workoutPackage->package_name;
        $m_amount = $orderData['purchase_price'];

        // Thông tin từ VNPay
        $vnp_BankCode = $vnpayData['vnp_BankCode'] ?? 'N/A';
        $vnp_TransactionNo = $vnpayData['vnp_TransactionNo'] ?? 'N/A';
        $vnp_PayDate = $vnpayData['vnp_PayDate'] ?? 'N/A';

        // Gửi email
        try {
            Mail::send(
                'frontend.mail.index',
                compact(
                    'm_user_name',
                    'm_workout_package_name',
                    'm_amount',
                    'vnp_BankCode',
                    'vnp_TransactionNo',
                    'vnp_PayDate'
                ),
                function ($email) use ($m_user_mail, $m_user_name) {
                    $email->to($m_user_mail, $m_user_name)
                        ->subject('Mua hàng thành công!');
                }
            );

            return "Email sent successfully.";
        } catch (\Exception $e) {
            return "Failed to send email: " . $e->getMessage();
        }
    }
}
