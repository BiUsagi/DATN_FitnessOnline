@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Danh sách nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item active">Nhân viên</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách nhân viên</h5>
                                {{-- <a href="{{ route('admin.create') }}" class="btn-customize"><i class="bi bi-plus-lg"></i>
                                    Thêm nhân viên</a> --}}
                            </div>

                            <div class="row gx-4">
                                @foreach ($data as $item)
                                    <div class="col-xxl-3 col-sm-6">
                                        <div class="border pb-3 pe-3 ps-3 rounded-2 text-center mb-4">
                                            <img src="assets/backend/img/accounts/{{ $item->avatar }}"
                                                class="img-10x rounded-pill img-cover" alt="Gym Dashboard">
                                            <h5>{{ $item->staff_name }}</h5>
                                            <h6>
                                                @if ($item->gender == 1)
                                                    <i class="bi bi-gender-male text-primary"></i> Nam
                                                @elseif ($item->gender == 0)
                                                    <i class="bi bi-gender-female text-danger"></i> Nữ
                                                @else
                                                    <i class="bi bi-gender-trans text-warning"></i> Khác
                                                @endif
                                            </h6>
                                            <ul class="list-group mb-3 fs-7">

                                                <li class="list-group-item d-flex justify-content-between align-items-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Số lượng khóa học">
                                                    Gói Tập
                                                    <span class="badge border border-success text-success">
                                                        {{ $item->getCourseCount() }}
                                                    </span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Số lượng học viên">
                                                    Số Học Viên
                                                    <span class="badge border border-danger text-danger">
                                                        {{ $item->getStudentCount() }}
                                                    </span>
                                                <li class="list-group-item d-flex justify-content-between align-items-center "
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Thời gian tham gia">
                                                    Hoạt Động
                                                    <span class="badge border border-primary text-primary ">
                                                        {{ $item->getActiveDuration() }}
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="row d-flex justify-content-around">
                                                {{-- xem --}}
                                                <a href="{{ route('admin.staff.info', ['id' => $item->id]) }}"
                                                    class="btn btn-success col-5" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Xem Chi Tiết"><i
                                                        class="ri-eye-fill"></i></a>
                                                {{-- sua --}}
                                                <a href="{{ route('admin.staff.update', ['id' => $item->id]) }}"
                                                    class="btn btn-primary col-5" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Chỉnh Sửa"><i
                                                        class="ri-edit-line"></i></a>
                                            </div>
                                            <!-- Rating -->
                                            <div class="mt-3">
                                                <span class="text-warning">
                                                    @php
                                                        // tính số sao
                                                        $fullStars = floor($item->rating); // full sao
                                                        $halfStar = $item->rating - $fullStars >= 0.5 ? 1 : 0; //nửa sao
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

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
