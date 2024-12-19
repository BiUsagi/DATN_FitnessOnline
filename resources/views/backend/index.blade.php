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
                  <h5 class="card-title">Tổng doanh thu<span></span></h5>

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
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                  <div class="card-body">
                      <h5 class="card-title">Top gói Tập Bán Nhiều Nhất</h5>
                      <table class="table table-borderless">
                          <thead>
                              <tr>
                                  <th scope="col">STT</th>
                                  <th scope="col">Tên gói tập</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Tổng số bán</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($topPackages as $index => $package)
                                  <tr>
                                      <th scope="row">{{ $index + 1 }}</th>
                                      <td class="ps-3">
                                          <a href="{{ route('workout_detail', $package->id) }}" class="text-dark fw-bold">
                                              {{ $package->package_name }}
                                          </a>
                                      </td>
                                      <td class="ps-3">{{ number_format($package->price, 0, ',', '.') }} VNĐ</td>
                                      <td class="ps-3">{{ $package->total_sold }} lượt bán</td>
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
                  <h5 class="card-title">Top khách hàng mua hàng<span></span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Thứ hạng</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $index => $order)
                        <tr>
                          <th scope="row">{{ $index + 1 }}</th>
                          <td>
                            <a href="{{ route('admin.customer.info', ['id' => $order->id]) }}" class="text-dark fw-bold">
                                {{$order->user_name }}
                            </a>
                          </td>
                          <td>{{ number_format($order->total_spent, 0, ',', '.') }} VNĐ</td>
                          <td>Hạng {{ $index + 1 }}</td>
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
                  <h5 class="card-title">Top nhân viên được đánh giá<span></span></h5>

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
                                    <a href="{{ route('admin.staff.info', ['id' => $staff->id]) }}" class="text-dark fw-bold">{{ $staff->staff_name }}</a> <!-- Tên nhân viên -->
                                </td>
                                <td>
                                    <a href="{{ route('admin.staff.info', ['id' => $staff->id]) }}">
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
                            Hôm nay, 
                            <br> {{ $user->created_at->format('H:i') }}
                        @elseif ($user->created_at->isYesterday())
                            Hôm qua, 
                           <br> {{ $user->created_at->format('H:i') }}
                        @else
                            {{ $user->created_at->format('d/m H:i') }}
                        @endif
                    </div>
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <div class="activity-content">
                          <a href="{{ route('admin.customer.info', ['id' => $user->id]) }}" class="text-dark fw-bold">
                            {{ $user->user_name }}
                          </a> đã đăng ký thành công
                            {{-- <a href="{{ route('admin.customer.info', ['id' => $user->id]) }}" class="fw-bold text-dark">{{ $user->email }}</a> --}}
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

              <div class="news pb-3">
                @foreach($posts->take(5) as $post)
                <div class="post-item clearfix">
                    <a href="{{ route('posts-details.index', $post->id) }}"><img src="{{ asset('uploads/post_image/' . $post->image) }}" alt=""></a>
                    <h4><a href="{{ route('posts-details.index', $post->id) }}">{{ Str::limit($post->title , 70) }}</a></h4>
                    {{-- <p>{{ Str::limit($post->description, 60) }}</p>  <!-- Giới hạn mô tả --> --}}
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