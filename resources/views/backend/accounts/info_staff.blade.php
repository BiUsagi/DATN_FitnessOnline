@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Thông tin nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item">Nhân viên</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body pt-4">

                            <!-- Row starts -->
                            <div class="row gx-4">
                                <div class="col-xxl-2 col-sm-3">
                                    <img src="assets/backend/img/{{ $data->avatar }}"
                                        class="img-fluid rounded-3 staff-avatar-custom" alt="Gym Dashboard">
                                </div>
                                <div class="col-xxl-4 col-sm-8">
                                    <div class="mt-3">
                                        <h3>{{ $data->staff_name }}</h3>
                                        <h6>
                                            @if ($data->gender == 1)
                                                <i class="bi bi-gender-male text-primary "></i> Nam
                                            @elseif ($data->gender == 0)
                                                <i class="bi bi-gender-female text-danger"></i> Nữ
                                            @elseif ($data->gender == 2)
                                                <i class="bi bi-gender-trans text-warning"></i> Khác
                                            @else
                                                <i class="bi bi-gender-trans text-secondary"></i> Chưa xác định
                                            @endif
                                        </h6>
                                        <h6>{{ $age }} tuổi</h6>
                                        <h6> Hoạt động: {{ $data->getActiveDuration() }}</h6>
                                        <h6>
                                            <span class="text-warning">
                                                @php
                                                    // tính số sao
                                                    $fullStars = floor($data->rating); // full sao
                                                    $halfStar = $data->rating - $fullStars >= 0.5 ? 1 : 0; //nửa sao
                                                @endphp

                                                <!-- Hiển thị full sao -->
                                                @for ($i = 1; $i <= $fullStars; $i++)
                                                    <i class="bi bi-star-fill"></i>
                                                @endfor

                                                <!-- Hiển thị nửa sao -->
                                                @if ($halfStar)
                                                    <i class="bi bi-star-half"></i>
                                                @endif

                                                <!-- Hiển thị sao trống cho đến tối đa 5 sao -->
                                                @for ($i = $fullStars + $halfStar; $i < 5; $i++)
                                                    <i class="bi bi-star"></i>
                                                @endfor
                                            </span>
                                            <span class="ms-2">
                                                <small class="text-secondary">({{ $data->rating }} / 5)
                                                    ({{ $data->rating_count }} bình chọn)</small>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-sm-4">
                                    <!-- Khóa Học -->
                                    <div class="border rounded-2 p-2">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="icon-box lg bg-danger-subtle rounded-5 mb-2 no-shadow">
                                                <i class="ri-dashboard-line fs-4 text-danger"></i>
                                            </div>
                                            <h1 class="text-danger">{{ $data->getCourseCount() }}</h1>
                                            <h6>Khóa Học</h6>
                                        </div>
                                    </div>
                                    <!-- Khóa Học end -->
                                </div>
                                <div class="col-xxl-2 col-sm-4">
                                    <!-- Học Viên -->
                                    <div class="border rounded-2 p-2">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="icon-box lg bg-primary-subtle rounded-5 mb-2 no-shadow">
                                                <i class="ri-empathize-line fs-4 text-primary"></i>
                                            </div>
                                            <h1 class="text-primary">{{ $data->getCourseCount() }}</h1>
                                            <h6>Học Viên</h6>
                                        </div>
                                    </div>
                                    <!-- Học Viên end -->
                                </div>

                                <div class="col-xxl-2 col-sm-4">
                                    <!-- Hoạt Động -->
                                    <div class="border rounded-2 p-2">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="icon-box lg bg-success-subtle rounded-5 mb-2 no-shadow">
                                                <i class="bi bi-cash-coin fs-4 text-success"></i>
                                            </div>
                                            <h1 class="text-success"> 0
                                                <span class="custom-font-unit">vnd</span>
                                            </h1>

                                            <h6>Thu Nhập</h6>
                                        </div>
                                    </div>
                                    <!-- Hoạt Động end -->
                                </div>
                            </div>
                            <!-- Row ends -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-4">
                <div class="col-xl-8 col-sm-12">

                    <!-- Row starts -->
                    <div class="row gx-4">
                        <div class="col-sm-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Khóa Học</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center d-flex">
                                        <div class=" col-sm-6">
                                            <div class="card p-0">
                                                <img src="assets/backend/img/demo3.png" class="img-cover img-banner-custom"
                                                    alt="...">
                                                <div class="card-body pt-3 row">
                                                    <h5 class="card-title col-12">Tập chân thầy Đạt</h5>
                                                    <div class="card-text col-12">Thời gian: 3 tháng</div>
                                                    <div class="card-text col-12">Còn lại: 24 ngày</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6">
                                            <div class="card p-0">
                                                <img src="assets/backend/img/demo3.png" class="img-cover img-banner-custom"
                                                    alt="...">
                                                <div class="card-body pt-3 row">
                                                    <h5 class="card-title col-12">Tập tay anh Rin</h5>
                                                    <div class="card-text col-12">Thời gian: 6 tháng</div>
                                                    <div class="card-text col-12">Còn lại: 24 ngày</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6">
                                            <div class="card  p-0">
                                                <img src="assets/backend/img/z5744025567765_d84710b48e5ca2efa1db72137f826b60.jpg"
                                                    class="img-cover img-banner-custom" alt="...">
                                                <div class="card-body pt-3 row">
                                                    <h5 class="card-title col-12">Tập chân thầy Đạt</h5>
                                                    <div class="card-text col-12">Thời gian: 3 tháng</div>
                                                    <div class="card-text col-12">Đã hoàn thành</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6">
                                            <div class="card  p-0">
                                                <img src="assets/backend/img/demo3.png" class="img-cover img-banner-custom"
                                                    alt="...">
                                                <div class="card-body pt-3 row">
                                                    <h5 class="card-title col-12">Tập chân thầy Đạt</h5>
                                                    <div class="card-text col-12">Thời gian: 3 tháng</div>
                                                    <div class="card-text col-12">Đã hoàn thành</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row ends -->

                </div>
                <div class="col-xl-4 col-sm-12">

                    <!-- Row starts -->
                    <div class="row gx-4">
                        <div class="col-xl-12 col-sm-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between  align-items-center">
                                    <h5 class="card-title">Giới Thiệu</h5>
                                    {{-- sua --}}
                                    <a href="{{ route('admin.staff.update', ['id' => $data->id]) }}"
                                        class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Chỉnh Sửa"><i class="ri-edit-line"></i></a>
                                </div>
                                <div class="card-body">
                                    <p class="pt-2">{{ $data->introduction }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between  align-items-center">
                                    <h5 class="card-title">Thông Tin</h5>
                                    {{-- sua --}}
                                    <a href="{{ route('admin.staff.update', ['id' => $data->id]) }}"
                                        class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Chỉnh Sửa"><i class="ri-edit-line"></i></a>
                                </div>
                                <div class="card-body mt-2">
                                    <h6> <strong> Di Động: </strong></h6>
                                    <h6>{{ $data->phone_number }}</h6>
                                    <h6> <strong> Email:</strong></h6>
                                    <h6>{{ $data->email }}</h6>
                                    <h6><strong>Ngày Sinh:</strong></h6>
                                    <h6>{{ $data->birthday }}</h6>
                                    <h6><strong>Địa chỉ:</strong></h6>
                                    <h6>{{ $data->address }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row ends -->
            </div>
        </section>

    </main><!-- End #main -->
@endsection
