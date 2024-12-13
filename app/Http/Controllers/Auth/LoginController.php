<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Http\Requests\frontend\LoginRequest;
use App\Http\Requests\frontend\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;



class LoginController extends Controller
{
    function index()
    {
        return view('frontend/layouts/auth/login');
    }

    public function login_(LoginRequest $request)
    {
        // Tìm người dùng theo email
        $user = User::where('email', $request->email)->first();
        $role = User::where('role_012', $request->email)->first();
        // Kiểm tra xem người dùng có tồn tại không và so sánh mật khẩu
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Thông tin đăng nhập không chính xác'], 401);
        }

        // Kiểm tra nếu tài khoản chưa được xác minh (is_verified == 0)
        if ($user->is_verified != 1) {
            return response()->json(['message' => 'Tài khoản không tồn tại'], 403);
        }
        Auth::login($user);

        if ($user->role_012 == 2) {
            $redirectUrl = route('admin');
        }elseif($user->role_012 == 1){
            $redirectUrl = route('admin.walletpt');
        } else {
            $redirectUrl = $request->input('redirect_url') ?? route('index');
        }
        // Tạo token khi người dùng đăng nhập thành công
        $token = $user->createToken('AdminAPI')->plainTextToken;

        // Trả về token cùng thông tin người dùng
        return response()->json([
            'success' => true,
            'token' => $token,
            'redirect_url' => $redirectUrl
        ]);
    }

    public function register(RegisterRequest $request)
    {
        // Tạo mã OTP ngẫu nhiên (6 chữ số)
        $otp = random_int(100000, 999999);

        // Tạo người dùng mới
        $user = User::create([
            'user_name' => $request['user_name'],
            'email' => $request['email1'],
            'password' => bcrypt($request['password1']),
            'gender' => 2,
            'token' => $otp, // Lưu mã OTP vào trường token
        ]);

        //luu order vào cache
        $cache_email = [
            'email' => $user->email,
            'token' => $user->token,
        ];

        // Lưu order mới vào cache
        Cache::put('cache_email', $cache_email, now()->addMinutes(10));

        // Gửi mã OTP tới email
        Mail::to($user->email)->send(new \App\Mail\OtpMail($otp));

        // Gán quyền (nếu cần)
        $user->assignRoleBasedOnField($user->id);

        // Tạo ví cho người dùng vừa đăng ký
        $wallet = new Wallet();
        $wallet->user_id = $user->id; // Lấy ID người dùng vừa tạo
        $wallet->balance = 0.00; // Số dư mặc định
        $wallet->currency = 'VND'; // Đơn vị tiền tệ mặc định
        $wallet->save();

        // Chuyển hướng đến trang OTP
        return redirect()->route('otp.index')->with('success', 'Đăng ký thành công! Vui lòng nhập mã OTP đã gửi đến email của bạn.');
    }

    public function otp()
    {
        // Lấy email từ cache
        $cache_email = Cache::get('cache_email');

        // Nếu không có email trong cache, bạn có thể trả về một thông báo lỗi
        if (!$cache_email) {
            return redirect()->route('login.index')->withErrors(['email' => 'Không tìm thấy email trong cache.']);
        }

        $email = $cache_email['email'];

        // Truyền email vào view
        return view('frontend/layouts/auth/otp', compact('email'));
    }

    public function otp_(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
            'otp5' => 'required|digits:1',
            'otp6' => 'required|digits:1',
        ]);

        // Ghép các phần của OTP lại thành chuỗi hoàn chỉnh
        $otp = $request->otp1 . $request->otp2 . $request->otp3 . $request->otp4 . $request->otp5 . $request->otp6;

        // Lấy dữ liệu từ cache
        $cache_email = Cache::get('cache_email');

        // Kiểm tra xem email và token có tồn tại trong cache không
        if (!$cache_email) {
            return redirect()->back()->withErrors(['email' => 'Không tìm thấy email trong cache.']);
        }

        $email = $cache_email['email']; // Lấy email từ cache
        $token = $cache_email['token']; // Lấy token từ cache

        // Tìm người dùng theo email
        $user = User::where('email', $email)->first();

        // Kiểm tra nếu không tìm thấy người dùng
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Không tìm thấy tài khoản.']);
        }

        // Đối chiếu OTP với token trong cache
        if ($user->token === $otp) {
            // Nếu đúng, cập nhật trạng thái xác minh
            // Thay đổi trực tiếp và lưu lại bằng save
            $user->token = null;
            $user->is_verified = 1; // hoặc true nếu cột là boolean
            $user->save();


            // Xóa cache sau khi xác minh thành công
            Cache::forget('cache_email');

            return redirect()->route('login.index')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } else {
            // Nếu sai, quay lại và báo lỗi
            return redirect()->back()->withErrors(['otp' => 'Mã OTP không đúng.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function forgotPass()
    {
        return view('frontend/layouts/auth/forgot_password');
    }
}
