<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workout_Package;
use App\Models\Staff;
use App\Models\Posts;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        //ĐẾM TỔNG CÁC BÀI TẬP
        $totalPackages = Workout_Package::count();
        //LẤY TẤT CẢ CÁC BÀI TẬP
        $allpackages = Workout_Package::orderBy('created_at', 'desc')->get();
        //ĐẾM TỔNG SỐ NHÂN VIÊN
        $totalStaff = Staff::count();
        //LẤY CÁC NHÂN VIÊN
        $allstaff = Staff::orderBy('created_at', 'desc')->get();
        //LẤY TẤT CẢ ODER
        $orders = Order::with('user', 'workoutPackage', 'voucher')->orderBy('created_at', 'desc')->get();
        //TÍNH TỔNG DANH THU TỪ ODER
        $totaloder = Order::sum('purchase_price');
        //LẤY TẤT CẢ BÀI VIẾT
        $posts = Posts::orderBy('created_at', 'desc')->get();
        return view('backend/index', compact('totalPackages','totalStaff','allpackages','allstaff','orders','totaloder','posts'));
    }
}