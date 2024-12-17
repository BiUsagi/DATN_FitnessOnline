<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workout_Package;
use App\Models\Staff;
use App\Models\Posts;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   
    
    public function index()
    {
        //ĐẾM TỔNG CÁC BÀI TẬP
        $totalPackages = Workout_Package::count();
        //LẤY top 5 gói tập bán chạy
        $topPackages = DB::table('workout_packages')
            ->join('orders', 'workout_packages.id', '=', 'orders.workout_package_id')
            ->select('workout_packages.id', 'workout_packages.package_name','workout_packages.price', DB::raw('COUNT(orders.id) as total_sold'))
            ->groupBy('workout_packages.id', 'workout_packages.package_name','workout_packages.price')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        //ĐẾM TỔNG SỐ NHÂN VIÊN
        $totalStaff = Staff::count();
        //LẤY CÁC NHÂN VIÊN
        $allstaff = Staff::orderBy('rating_count', 'desc')->get();
        //LẤY top 5 người mua hàng
        $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('users.id', 'users.user_name', DB::raw('SUM(orders.purchase_price) as total_spent'))
                ->groupBy('users.id', 'users.user_name')
                ->orderByDesc('total_spent')
                ->limit(5)
                ->get();
        //TÍNH TỔNG DANH THU TỪ ODER
        $totaloder = Order::sum('purchase_price');
        //LẤY TẤT CẢ BÀI VIẾT
        $posts = Posts::orderBy('created_at', 'desc')->get();
        //Lấy TẤT CẢ USER
        $allUsers = User::orderBy('created_at', 'desc')->limit(5)->get();
        return view('backend/index', compact('totalPackages','totalStaff','topPackages','allstaff','orders','totaloder','posts','allUsers'));
    }
}