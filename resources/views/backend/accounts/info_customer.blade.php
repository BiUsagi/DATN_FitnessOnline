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
                                    <img src="https://via.placeholder.com/450" alt="User Avatar"
                                        class="img-fluid rounded-circle image-user-custom">
                                </div>
                                <!-- Thông tin chi tiết -->
                                <div class="col-md-8 d-flex justify-content-center align-items-center">
                                    <div class="row">
                                        <div class="col-4 justify-content-end d-flex mg-top">
                                            <strong>Tên:</strong>
                                        </div>
                                        <div class="col-8 mg-top">{{ $data->user_name }}</div>
                                        <div class="col-4 justify-content-end d-flex mg-top">
                                            <strong>Ngày sinh:</strong>
                                        </div>
                                        <div class="col-8 mg-top">{{ $data->birthday }}</div>
                                        <div class="col-4 justify-content-end d-flex mg-top">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-8 mg-top">{{ $data->email }}</div>
                                        <div class="col-4 justify-content-end d-flex mg-top">
                                            <strong>Số điện thoại:</strong>
                                        </div>
                                        <div class="col-8 mg-top">{{ $data->phone_number }}</div>
                                        <div class="col-4 justify-content-end d-flex mg-top">
                                            <strong>Địa chỉ:</strong>
                                        </div>
                                        <div class="col-8 mg-top">{{ $data->address }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Gói tập tham gia --}}
                    <div class="card">
                        <div class="card-body pt-4">

                            <h4 class="mb-3">
                                <strong>Khóa học đã tham gia:</strong>
                            </h4>
                            <div class="row justify-content-center d-flex">
                                <div class="col-md-4 col-xxl-3 col-sm-6">
                                    <div class="card p-0">
                                        <img src="https://via.placeholder.com/500" class="card-img-top" alt="...">
                                        <div class="card-body pt-3 row">
                                            <h5 class="card-title col-12">Tập chân thầy Đạt</h5>
                                            <div class="card-text col-12">Thời gian: 3 tháng</div>
                                            <div class="card-text col-12">Còn lại: 24 ngày</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xxl-3 col-sm-6">
                                    <div class="card p-0">
                                        <img src="https://via.placeholder.com/450" class="card-img-top" alt="...">
                                        <div class="card-body pt-3 row">
                                            <h5 class="card-title col-12">Tập tay anh Rin</h5>
                                            <div class="card-text col-12">Thời gian: 6 tháng</div>
                                            <div class="card-text col-12">Còn lại: 24 ngày</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xxl-3 col-sm-6">
                                    <div class="card  p-0">
                                        <img src="https://via.placeholder.com/450" class="card-img-top" alt="...">
                                        <div class="card-body pt-3 row">
                                            <h5 class="card-title col-12">Tập chân thầy Đạt</h5>
                                            <div class="card-text col-12">Thời gian: 3 tháng</div>
                                            <div class="card-text col-12">Đã hoàn thành</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xxl-3 col-sm-6">
                                    <div class="card  p-0">
                                        <img src="https://via.placeholder.com/450" class="card-img-top" alt="...">
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
