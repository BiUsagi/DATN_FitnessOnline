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
                            <div class="card-body">
                                <div class="row justify-content-center d-flex">
                                    @foreach ($workout_packages->orders as $order)
                                        <div class=" col-lg-4 col-sm-6">
                                            <div class="card p-0">
                                                <a href="{{ route('workout_detail', $order->workoutPackage->id) }}"><img
                                                        src="{{ asset('uploads/gym_package/' . $order->workoutPackage->image) }}"
                                                        class="img-cover img-banner-custom" alt="..."></a>
                                                <div class="card-body  row">
                                                    <span class="mb-1">{{ $order->workoutPackage->special_level }}</span>
                                                    <h5 class="card-title col-12"><a
                                                            href="{{ route('workout_detail', $order->workoutPackage->id) }}">{{ $order->workoutPackage->package_name }}</a>
                                                    </h5>
                                                    <div class="card-text col-12">
                                                        <p class="text-clamp">{!! nl2br(strip_tags($order->workoutPackage->description)) !!}</p>
                                                    </div>
                                                    <div class="card-text col-12"><span
                                                            class="d-inline-block fw-bold fs-5">{{ number_format($order->workoutPackage->price, 0, ',', '.') }}
                                                            VNĐ</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
