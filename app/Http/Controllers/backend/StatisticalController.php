<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StatisticalController extends Controller
{
    public function index()
    {
        // Lấy thống kê khách hàng theo từng tháng
        $customersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Tạo một mảng với 12 tháng, gán giá trị thống kê tương ứng
        $customerData = array_fill(1, 12, 0); // Tạo mảng có 12 phần tử, giá trị mặc định là 0

        foreach ($customersByMonth as $data) {
            $customerData[$data->month] = $data->total;
        }
        return view('backend/statistical/index', compact('customerData'));
    }
    public function customer()
    {
        return view('backend/statistical/customer');
    }
    public function package()
    {
        return view('backend/statistical/package');
    }
}