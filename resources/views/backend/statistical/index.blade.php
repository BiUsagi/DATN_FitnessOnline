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
                                    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                                    datasets: [{
                                        label: 'Doanh Thu (VND)',
                                        data: [5000000, 7000000, 10000000, 8000000, 12000000],
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: { title: { display: true, text: 'Tháng' } },
                                        y: { title: { display: true, text: 'Doanh Thu (VND)' }, beginAtZero: true }
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
                                        x: { title: { display: true, text: 'Tháng' } },
                                        y: { title: { display: true, text: 'Số Lượng Khách Hàng' }, beginAtZero: true }
                                    }
                                }
                            });

                            // Biểu đồ Gói Tập
                            const ctx3 = document.getElementById('packageSalesChart').getContext('2d');
                            const packageSalesChart = new Chart(ctx3, {
                                type: 'line',
                                data: {
                                    labels: [' 1', ' 2', ' 3', ' 4', ' 5', ' 6', ' 7', ' 8', ' 9', ' 10', ' 11', ' 12'],
                                    datasets: [{
                                        label: 'Số Gói Tập Bán Được',
                                        data: [50, 60, 70, 100, 150, 120, 180, 200, 220, 250, 270, 300], // Dữ liệu mẫu
                                        borderColor: 'rgba(255, 99, 132, 1)', // Màu của đường
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền dưới đường
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        x: { title: { display: true, text: 'Tháng' } },
                                        y: { title: { display: true, text: 'Số Gói Tập Bán Được' }, beginAtZero: true }
                                    }
                                }
                            });
                        });
                    </script>
                </div>
                
                <div class="col-5">
                    <!-- Thống kê gói tập -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thống Kê Gói Tập</h5>
                                
                                <!-- Bộ lọc riêng -->
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
                                
                                <!-- Bảng thống kê -->
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
                                            <tr>
                                                <td>1</td>
                                                <td>Gói Tập Yoga</td>
                                                <td style=" text-align: center ">120</td>
                                                <td>Thanh Rin</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Gói Tập Yoga</td>
                                                <td style=" text-align: center ">120</td>
                                                <td>Thanh Rin</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Gói Tập Yoga</td>
                                                <td style=" text-align: center ">120</td>
                                                <td>Thanh Rin</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Gói Tập Yoga</td>
                                                <td style=" text-align: center ">120</td>
                                                <td>Thanh Rin</td>
                                            </tr>
                                            <!-- Thêm các dòng khác -->
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
                                <h5 class="card-title">123</h5>
                                
                                <!-- Bộ lọc riêng -->
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
                                
                                <!-- Bảng thống kê -->
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
                                            <!-- Thêm các dòng khác -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thống kê doanh thu PT -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thống Kê Gói Tập</h5>
                                
                                <!-- Bộ lọc riêng -->
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
                                
                                <!-- Bảng thống kê -->
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
                                            <!-- Thêm các dòng khác -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </section>
</main>
@endsection
