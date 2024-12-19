<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StatisticalStaffController extends Controller
{
    public function staff(Request $request)
    {   
        $selectedYear = $request->year ?? now()->year;


        $user_id =  Auth::user()->id;
        $staff = Staff::where('user_id', $user_id)->first();
        $currentStaffId = $staff->id;

        // Truy vấn doanh thu theo tháng của PT hiện tại
        $monthlyRevenue = DB::table('orders')
            ->join('workout_packages', 'orders.workout_package_id', '=', 'workout_packages.id')
            ->where('workout_packages.staff_id', $currentStaffId)  // Lọc theo PT
            ->whereYear('orders.created_at', $selectedYear)  // Lọc theo năm
            ->select(
                DB::raw('MONTH(orders.created_at) as month'),
                DB::raw('SUM(orders.purchase_price) as total_revenue')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        //thống kê học viên
        // Lấy năm từ request, nếu không có thì mặc định là năm hiện tại
    $selectedYear = $request->year ?? now()->year;

    // Lấy staff_id từ session hoặc nếu có trong URL
    $user_id =  Auth::user()->id;
        $staff = Staff::where('user_id', $user_id)->first();
        $currentStaffId = $staff->id;


    // Lấy số học viên tham gia theo tháng của PT hiện tại
    $monthlyRegistrations = DB::table('orders')
        ->join('workout_packages', 'orders.workout_package_id', '=', 'workout_packages.id')
        ->where('workout_packages.staff_id', $currentStaffId)
        ->whereYear('orders.created_at', $selectedYear)  // Lọc theo năm
        ->select(
            DB::raw('MONTH(orders.created_at) as month'),
            DB::raw('COUNT(DISTINCT orders.user_id) as total_registrations') // Đếm số học viên duy nhất
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        


        

        return view('backend.statistical.staff', compact('monthlyRevenue', 'selectedYear','monthlyRegistrations'));
    }
}
