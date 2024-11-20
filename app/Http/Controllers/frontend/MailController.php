<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workout_Package;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
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
