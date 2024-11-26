@extends('backend/layouts/app-admin')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                {{-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> --}}

                <div class="card-body">
                  <h5 class="card-title">Tổng gói tập<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalPackages }} gói</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                {{-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> --}}

                <div class="card-body">
                  <h5 class="card-title">Tổng danh thu<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ number_format($totaloder, 0, ',', '.') }} VNĐ</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                {{-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> --}}

                <div class="card-body">
                  <h5 class="card-title">Nhân viên<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalStaff }} người</h6>
                      {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}

                    </div>
                  </div>

                </div>
              </div>

            </div>  <!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Gói tập<span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên gói tập</th>
                        <th scope="col">Level</th>
                        <th scope="col">Special_level</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($allpackages as $index => $package)
                        <tr>
                          <th scope="row" style="">{{ $index + 1 }}</th>
                          <td class="ps-3">
                            <a href="{{ route('admin.workout_package_detail', $package->id) }}" class="text-dark fw-bold">
                              {{ $package->package_name }}
                            </a>
                          </td>
                          <td class="ps-3">{{ $package->level }}</td>
                          <td class="ps-3">{{ $package->special_level }}</td>
                          <td class="ps-3"><span>{{ number_format($package->price, 0, ',', '.') }} VNĐ</span></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Mua Hàng<span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Tên gói tập</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Giá</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $index => $order)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>{{ $order->user->user_name }}</td>  <!-- Tên khách hàng -->
                          <td>{{ $order->workoutPackage->package_name }}</td>  <!-- Tên gói tập -->
                          <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>  <!-- Ngày mua -->
                          <td>{{ number_format($order->purchase_price, 0, ',', '.') }} VNĐ</td>  <!-- Giá -->
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Nhân viên<span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Đánh giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allstaff as $index => $staff)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Số thứ tự -->
                                <td>
                                    <a href="#" class="text-dark fw-bold">{{ $staff->staff_name }}</a> <!-- Tên nhân viên -->
                                </td>
                                <td>
                                    <a href="#">
                                        <img src="assets/backend/img/accounts/{{ $staff->avatar }}" alt="" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    </a> <!-- Ảnh nhân viên -->
                                </td>
                                <td>{{ $staff->birthday ? \Carbon\Carbon::parse($staff->birthday)->format('d/m/Y') : 'N/A' }}</td>
                                <td>{{ $staff->rating }}</td> <!-- Đánh giá -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Khách hàng đăng ký gần đây<span></span></h5>

              <div class="activity">
                @foreach ($allUsers as $user)
                    <div class="activity-item d-flex">
                      <div class="activite-label">
                        @if ($user->created_at->isToday())
                            Hôm nay, {{ $user->created_at->format('H:i') }}
                        @elseif ($user->created_at->isYesterday())
                            Hôm qua, {{ $user->created_at->format('H:i') }}
                        @else
                            {{ $user->created_at->format('d/m H:i') }}
                        @endif
                    </div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                            {{ $user->user_name }} đã đăng ký thành công
                            <a href="#" class="fw-bold text-dark">{{ $user->email }}</a>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
          <!-- End Recent Activity -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Bài viết<span></span></h5>

              <div class="news">
                @foreach($posts->take(5) as $post)
                <div class="post-item clearfix">
                    <a href="{{ route('posts-details.index', $post->id) }}"><img src="{{ asset('uploads/post_image/' . $post->image) }}" alt=""></a>
                    <h4><a href="{{ route('posts-details.index', $post->id) }}">{{ $post->title }}</a></h4>
                    <p>{{ Str::limit($post->description, 100) }}...</p>  <!-- Giới hạn mô tả -->
                </div>
            @endforeach

              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>
  <!-- End #main -->

  @endsection