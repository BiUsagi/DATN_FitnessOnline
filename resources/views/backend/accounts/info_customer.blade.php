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
                                <div class="col-md-4 text-center">
                                    <img src="https://via.placeholder.com/150" alt="User Avatar"
                                        class="img-fluid rounded-circle mb-3">
                                </div>
                                <!-- Thông tin chi tiết -->
                                <div class="col-md-8">
                                    <h4 class="mb-3">
                                        <!-- Họ và tên -->
                                        <strong>Họ và tên:</strong> {{ $data->user_name }}
                                    </h4>
                                    <ul class="list-group list-group-flush">
                                        <!-- Email -->
                                        <li class="list-group-item">
                                            <strong>Email:</strong> {{ $data->email }}
                                        </li>
                                        <!-- Địa chỉ -->
                                        <li class="list-group-item">
                                            <strong>Địa chỉ:</strong> {{ $data->address }}
                                        </li>
                                        <!-- Ngày tham gia -->
                                        <li class="list-group-item">
                                            <strong>Tham gia:</strong> {{ $data->created_at }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Gói tập tham gia --}}
                    <div class="card">
                        <div class="card-body pt-4">
                            <div class="col-md-8">
                                <h4 class="mb-3">
                                    <strong>Khóa học đã tham gia:</strong>
                                </h4>
                                <ul class="list-group list-group-flush">
                                    <!-- Email -->
                                    <li class="list-group-item">
                                        <strong>Email:</strong> {{ $data->email }}
                                    </li>
                                    <!-- Địa chỉ -->
                                    <li class="list-group-item">
                                        <strong>Địa chỉ:</strong> {{ $data->address }}
                                    </li>
                                    <!-- Ngày tham gia -->
                                    <li class="list-group-item">
                                        <strong>Tham gia:</strong> {{ $data->created_at }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
