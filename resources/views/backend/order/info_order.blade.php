@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Đơn Hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Đơn hàng</li>
                    <li class="breadcrumb-item">Danh sách đơn hàng</li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-3">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-xxl-3 col-sm-3 col-12">
                                    <img src="assets/frontend/images/logo.svg" alt="Bootstrap Admin Dashboard"
                                        class="img-fluid bg-black">
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="text-end">
                                        <p class="mb-2">
                                            Đơn hàng số. - <span class="text-danger"> #{{ $data->id }}</span>
                                        </p>
                                        <p class="mb-2"><span id="currentMonth"></span>{{ $data->created_at }}</p>
                                        <span class="badge bg-success">Thành Công</span>
                                    </div>
                                </div>
                                <div class="col-12 mb-5"></div>
                            </div>
                            <!-- Row end -->


                            <!-- Row start -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-outer mb-2 border rounded">
                                        <div class="table-responsive">
                                            <table class="table m-0 ">
                                                <thead>
                                                    <tr>
                                                        <th>Gói Tập</th>
                                                        {{-- <th>Nhân Viên</th> --}}
                                                        <th>Khách Hàng</th>
                                                        <th>Giá Tiền (VND)</th>
                                                        <th>Giảm Giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                {{ $data->getWorkoutPackageName() }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $data->getUserName() }}</td>
                                                        <td>
                                                            <h6> {{ number_format($data->price, 0, ',', '.') }}</h6>
                                                        </td>

                                                        <td>
                                                            <h6>0</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>
                                                            <p>Tồng Thu</p>
                                                            <p>Giảm Giá</p>
                                                            <h5 class="text-primary">Thanh Toán</h5>
                                                        </td>
                                                        <td>
                                                            <p> {{ number_format($data->price, 0, ',', '.') }}</p>
                                                            <p>0</p>
                                                            <h5 class="text-primary">
                                                                {{ number_format($data->price, 0, ',', '.') }}</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">
                                                            <h6 class="note">Note:</h6>
                                                            <p class="small m-0">
                                                                Nếu có bất kỳ điều gì khác chúng tôi có thể làm, vui lòng
                                                                cho chúng tôi biết!
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->

                            <!-- Row start -->
                            <div class="row mt-3">
                                <div class="col-sm-12 col-12">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-outline-secondary">
                                            Tải xuống
                                        </button>
                                        <button class="btn btn-primary">
                                            In ra
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
