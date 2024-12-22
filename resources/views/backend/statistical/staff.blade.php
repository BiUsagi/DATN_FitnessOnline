@extends('backend.layouts.app-admin')

@section('main')
    <main id="main" class="main">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="pagetitle">
            <h1>Thống Kê</h1>

            <form method="GET" action="{{ route('staff.statistical') }}" id="filterForm" class="d-flex align-items-center mb-4 ms-4 mt-4">
                <label for="year" class="me-2 fw-bold">Chọn Năm:</label>
                <select name="year" id="year" class="form-select w-auto" onchange="document.getElementById('filterForm').submit();">
                    @for ($i = now()->year; $i >= 2000; $i--)
                        <option value="{{ $i }}" {{ $selectedYear == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </form>
        </div>
        
        <section class="section dashboard">
            <div class="row">
                <div class="col-6">
                    <!-- Biểu đồ Doanh Thu -->
                    <div class="card">
    
                        <div class="card-body">
                            <h5 class="card-title text-center">Doanh Thu của PT ({{ $selectedYear }})</h5>
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                    

                    <script>
                            document.addEventListener('DOMContentLoaded', function () {
                            const monthlyRevenueData = @json($monthlyRevenue); // Dữ liệu từ controller

                            // Tạo mảng cho tháng và doanh thu
                            const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
                            const data = new Array(12).fill(0);  // Mảng chứa doanh thu của từng tháng (khởi tạo với giá trị 0)

                            // Điền dữ liệu doanh thu vào mảng data
                            monthlyRevenueData.forEach(item => {
                                data[item.month - 1] = item.total_revenue;  // Gán doanh thu vào đúng tháng (tháng bắt đầu từ 1, mảng bắt đầu từ 0)
                            });

                            // Tạo biểu đồ
                            const ctx = document.getElementById('revenueChart').getContext('2d');
                            const revenueChart = new Chart(ctx, {
                                type: 'line',  // Loại biểu đồ
                                data: {
                                    labels: labels,  // Các tháng
                                    datasets: [{
                                        label: 'Doanh Thu (VND)',
                                        data: data,  // Dữ liệu doanh thu
                                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
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
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Doanh Thu (VND)'
                                            }
                                        }
                                    }
                                }
                            });

                        });
                        
                    </script>
                </div>
                <div class="col-6">
                    <!-- Biểu đồ Doanh Thu -->
                    <div class="card">
                    <!-- Học Viên Tham Gia -->
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title text-center">Học Viên Tham Gia (Năm {{ $selectedYear }})</h5>
                            <canvas id="customerRegistrationChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                        const monthlyRegistrationsData = @json($monthlyRegistrations);

                        const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
                        const data = new Array(12).fill(0);  

                        monthlyRegistrationsData.forEach(item => {
                            data[item.month - 1] = item.total_registrations;  
                        });

                        const ctx = document.getElementById('customerRegistrationChart').getContext('2d');
                        const registrationChart = new Chart(ctx, {
                            type: 'line',  
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Số Học Viên Tham Gia',
                                    data: data,  
                                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                    borderColor: 'rgba(75, 192, 192, 1)',  
                                    borderWidth: 1
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
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Số Học Viên',
                                        },
                                        ticks: {
                                            stepSize: 1 
                                        }
                                    }
                                }
                            }
                        });
                    });
                    </script>
                </div>

            </div>
            
        </div>
    </section>
</main>
@endsection
