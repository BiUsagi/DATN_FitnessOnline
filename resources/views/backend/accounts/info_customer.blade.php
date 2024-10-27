@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Thông tin người dùng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item">Người dùng</li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-4">
                            <div class="row">
                                <!-- Avatar người dùng -->
                                <div class="col-md-4 text-center  d-flex justify-content-center align-items-center">
                                    <img src="assets/backend/img/accounts/{{ $data->avatar }}" alt="User Avatar"
                                        class="img-fluid rounded-circle image-user-custom img-cover">
                                </div>
                                <!-- Thông tin chi tiết -->
                                <div class="col-md-8 d-flex justify-content-center align-items-center">
                                    <div class="row">
                                        <div class="col-4 justify-content-end d-flex ">
                                            <strong>Tên:</strong>
                                        </div>
                                        <div class="col-8 ">{{ $data->user_name }}</div>
                                        <div class="col-4 justify-content-end d-flex ">
                                            <strong>Giới tính:</strong>
                                        </div>
                                        <div class="col-8 ">
                                            @if ($data->gender == 1)
                                                <i class="bi bi-gender-male text-primary"></i> Nam
                                            @elseif ($data->gender == 0)
                                                <i class="bi bi-gender-female text-danger"></i> Nữ
                                            @else
                                                <i class="bi bi-gender-trans text-warning"></i> Khác
                                            @endif
                                        </div>
                                        <div class="col-4 justify-content-end d-flex ">
                                            <strong>Ngày sinh:</strong>
                                        </div>
                                        <div class="col-8 ">
                                            {{ $data->birthday }} <i class="ri-account-circle-fill"></i>
                                            {{ $age }} tuổi
                                        </div>
                                        <div class="col-4 justify-content-end d-flex ">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-8 ">{{ $data->email }}</div>
                                        <div class="col-4 justify-content-end d-flex ">
                                            <strong>Số điện thoại:</strong>
                                        </div>
                                        <div class="col-8 ">{{ $data->phone_number }}</div>
                                        <div class="col-4 justify-content-end d-flex">
                                            <strong>Địa chỉ:</strong>
                                        </div>
                                        <div class="col-8">{{ $data->address }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Gói tập tham gia --}}
                    <div class="card">
                        <div class="card-body pt-4">

                            <h4 class="mb-3">
                                <strong>Gói tập đã tham gia:</strong>
                            </h4>
                            <div class="row justify-content-center d-flex">
                                <div class="col-md-4 col-xxl-3 col-sm-6">
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
                                <div class="col-md-4 col-xxl-3 col-sm-6">
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
                                <div class="col-md-4 col-xxl-3 col-sm-6">
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
                                <div class="col-md-4 col-xxl-3 col-sm-6">
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
        </section>

    </main><!-- End #main -->
@endsection
