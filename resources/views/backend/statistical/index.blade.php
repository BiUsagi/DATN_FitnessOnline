@extends('backend.layouts.app-admin')

@section('main')
    <main id="main" class="main">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="pagetitle">
            <h1>Thống Kê</h1>
        </div>
        
        <section class="section dashboard">
            <div class="row">
                <div class="col-7">
                    <!-- Biểu đồ Doanh Thu -->
                    <div class="card">
                        <form method="GET" action="{{ route('admin.statistical') }}" id="filterForm" class="d-flex align-items-center mb-4 mb-4 ms-4 mt-4">
                            <label for="year" class="me-2 fw-bold">Chọn Năm:</label>
                            <select name="year" id="year" class="form-select w-auto" onchange="document.getElementById('filterForm').submit();">
                                @for ($i = now()->year; $i >= 2000; $i--)
                                    <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </form>
                        <div class="card-body">
                            <h5 class="card-title text-center">Doanh Thu </h5>
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <!-- Biểu đồ Khách Hàng -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Khách Hàng Đăng Ký</h5>
                            <canvas id="customerRegistrationChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                    
                    <!-- Biểu đồ Gói Tập -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Gói Tập</h5>
                            <canvas id="packageSalesChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            // Biểu đồ Doanh Thu
                            const ctx1 = document.getElementById('revenueChart').getContext('2d');
                            const revenueChart = new Chart(ctx1, {
                                type: 'line',
                                data: {
                                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                                    datasets: [{
                                        label: 'Doanh Thu (VND)',
                                        data: {{ json_encode(array_values($revenueData)) }},
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Tháng'
                                            }
                                        },
                                        y: {
                                            title: {
                                                display: true,
                                                text: 'Doanh Thu (VND)'
                                            },
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });


                            // Biểu đồ Khách Hàng
                            const ctx2 = document.getElementById('customerRegistrationChart').getContext('2d');
                            const customerRegistrationChart = new Chart(ctx2, {
                                type: 'line',
                                data: {
                                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                                    datasets: [{
                                        label: 'Số Lượng Khách Hàng',
                                        data: {{ json_encode(array_values($customerData)) }},
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Tháng'
                                            }
                                        },
                                        y: {
                                            title: {
                                                display: true,
                                                text: 'Số Lượng Khách Hàng'
                                            },
                                            beginAtZero: true,
                                            ticks: {
                                                stepSize: 20 // Đặt bước tăng là 20
                                            }
                                        }
                                    }
                                }
                            });

                            // Biểu đồ Gói Tập
                            const ctx3 = document.getElementById('packageSalesChart').getContext('2d');
                            const packageSalesChart = new Chart(ctx3, {
                                type: 'line',
                                data: {
                                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                                    datasets: [{
                                        label: 'Số Gói Tập Bán Được',
                                        data: {{ json_encode(array_values($packageSalesData)) }},
                                        borderColor: 'rgba(255, 99, 132, 1)', // Màu của đường
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền dưới đường
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: { title: { display: true, text: 'Tháng' } },
                                        y: { title: { display: true, text: 'Số Gói Tập Bán Được' }, beginAtZero: true,
                                        ticks: {
                                                stepSize: 1 // Đặt bước tăng là 20
                                            } 
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
                
                <div class="col-5">
                    <!-- Thống kê doanh thu -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Top 5 PT Có Doanh Thu Cao Nhất</h5>
                                
                                <!-- Bộ lọc riêng -->
                                <form class="row mb-3 d-flex justify-between" method="GET" action="{{ route('admin.statistical') }}">
                                    <div class="col-md-6 col-lg-3" style="flex:1 ;font-size: 13px">
                                        <label for="startDatePackage" class="form-label">Ngày Bắt Đầu</label>
                                        <input type="date" id="startDatePackage" name="start_date" class="form-control" style="font-size: 13px" 
                                            value="{{ old('start_date', $startDate) }}">
                                    </div>
                                    <div class="col-md-6 col-lg-3" style="flex:1; font-size: 13px">
                                        <label for="endDatePackage" class="form-label">Ngày Kết Thúc</label>
                                        <input type="date" id="endDatePackage" name="end_date" class="form-control" style="font-size: 13px" 
                                            value="{{ old('end_date', $endDate) }}">
                                    </div>
                                    <div class="col-md-6 col-lg-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary w-100" style="font-size: 13px">Lọc</button>
                                    </div>
                                </form>
                    
                                <!-- Bảng thống kê -->
                                <div class="table-responsive" style="font-size: 13px">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Nhân Viên</th>
                                                <th>Doanh Thu (VNĐ)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($topPTs as $index => $pt)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pt->staff_name }}</td>
                                                    <td>{{ number_format($pt->total_revenue, 0, ',', '.') }} VNĐ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thống kê PT đăng gói tập -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Top 5 Gói Tập Bán Chạy Nhất</h5>
                                
                                <!-- Bảng thống kê -->
                                <div class="table-responsive" style="font-size: 13px">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Gói Tập</th>
                                                <th>Số Lần Đăng Ký</th>
                                                <th>Tên PT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($topPackages as $index => $package)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $package->package_name }}</td>
                                                <td style="text-align: center">{{ $package->order_count }}</td>
                                                <td>{{ $package->staff_name ?? 'Không có PT' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Thống kê doanh thu PT -->
                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thống Kê Gói Tập</h5>
                                
                                
                                <form class="row mb-3 d-flex justify-between" style="
                                justify-content: space-between;
                                display: flex;">
                                    <div class="col-md-6 col-lg-3" style="flex:1 ;font-size: 13px ">
                                        <label for="startDatePackage" class="form-label">Ngày Bắt Đầu</label>
                                        <input type="date" id="startDatePackage" class="form-control" style="font-size: 13px">
                                    </div>
                                    <div class="col-md-6 col-lg-3" style="flex:1; font-size: 13px">
                                        <label for="endDatePackage" class="form-label">Ngày Kết Thúc</label>
                                        <input type="date" id="endDatePackage" class="form-control" style="font-size: 13px">
                                    </div>
                                    <div class="col-md-6 col-lg-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary w-100" style="font-size: 13px">Lọc</button>
                                    </div>
                                </form>
                                

                                <div class="table-responsive" style="font-size: 13px">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên gói tập</th>
                                                <th>Số Lần Đăng Ký</th>
                                                <th>Tên PT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Gói Tập Yoga</td>
                                                <td style=" text-align: center ">120</td>
                                                <td>Thanh Rin</td>
                                            </tr>
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
            
        </div>
    </section>
</main>
@endsection
