<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function index(Request $request)
    {
        // Lấy năm từ request hoặc mặc định là năm hiện tại
    $selectedYear = $request->get('year', now()->year);

    // Lấy thống kê khách hàng theo từng tháng cho năm đã chọn
    $customersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
        ->whereYear('created_at', $selectedYear) // Thêm điều kiện lọc theo năm
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Tạo một mảng với 12 tháng, gán giá trị thống kê tương ứng
    $customerData = array_fill(1, 12, 0); // Tạo mảng có 12 phần tử, giá trị mặc định là 0

    foreach ($customersByMonth as $data) {
        $customerData[$data->month] = $data->total;
    }

    // DOANH THU
    $monthlyRevenue = DB::table('orders')
        ->selectRaw('MONTH(created_at) as month, SUM(purchase_price) as total')
        ->whereYear('created_at', $selectedYear)
        ->groupByRaw('MONTH(created_at)')
        ->orderByRaw('MONTH(created_at)')
        ->get();

    // Tạo một mảng mặc định cho 12 tháng với giá trị doanh thu là 0
    $revenueData = array_fill(1, 12, 0);

    foreach ($monthlyRevenue as $data) {
        $revenueData[$data->month] = $data->total;
    }
    // THỐNG KÊ SỐ GÓI TẬP ĐÃ BÁN
    $packageSales = DB::table('orders')
        ->selectRaw('MONTH(created_at) as month, COUNT(workout_package_id) as total')
        ->whereYear('created_at', $selectedYear)
        ->groupByRaw('MONTH(created_at)')
        ->orderByRaw('MONTH(created_at)')
        ->get();

    // Tạo một mảng mặc định cho 12 tháng với giá trị 0
    $packageSalesData = array_fill(1, 12, 0);

    foreach ($packageSales as $data) {
        $packageSalesData[$data->month] = $data->total;
    }


    //DANH THU NHÂN VIÊN
    // Lấy ngày bắt đầu và ngày kết thúc từ request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    // Truy vấn lấy doanh thu theo PT
    $query = DB::table('orders')
        ->join('workout_packages', 'orders.workout_package_id', '=', 'workout_packages.id')
        ->join('staff', 'workout_packages.staff_id', '=', 'staff.id')
        ->select('staff.staff_name', DB::raw('SUM(orders.purchase_price) as total_revenue'))
        ->groupBy('staff.id', 'staff.staff_name')
        ->orderByDesc('total_revenue'); // Sắp xếp theo doanh thu giảm dần

    // Lọc theo ngày bắt đầu và kết thúc nếu có
    if ($startDate && $endDate) {
        $query->whereBetween('orders.created_at', [$startDate, $endDate]);
    }
    // Lấy 5 PT có doanh thu cao nhất
    $topPTs = $query->limit(5)->get();

    // Truy vấn lấy top gói tập bán chạy
    $query = DB::table('orders')
    ->join('workout_packages', 'orders.workout_package_id', '=', 'workout_packages.id')
    ->join('staff', 'workout_packages.staff_id', '=', 'staff.id') // Thêm join với bảng staff để lấy thông tin PT
    ->select('workout_packages.package_name', DB::raw('COUNT(orders.id) as order_count'), 'staff.staff_name') // Lấy tên PT từ bảng staff
    ->groupBy('workout_packages.id', 'workout_packages.package_name', 'staff.staff_name') // Cập nhật groupBy
    ->orderByDesc('order_count'); // Sắp xếp theo số lượng đơn hàng giảm dần

    // Lọc theo ngày bắt đầu và kết thúc nếu có
    if ($startDate && $endDate) {
    $query->whereBetween('orders.created_at', [$startDate, $endDate]);
    }

    // Lấy 5 gói tập bán chạy nhất
    $topPackages = $query->limit(5)->get();

        return view('backend/statistical/index', compact('customerData','revenueData','selectedYear','packageSalesData','topPTs','topPackages','startDate', 'endDate'));
    }
    
    public function package()
    {
        return view('backend/statistical/package');
    }
}