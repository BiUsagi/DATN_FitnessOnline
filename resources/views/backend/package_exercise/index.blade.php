@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí lộ trình tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí lộ trình tập</li>
                    <li class="breadcrumb-item active">Danh sách lộ trình</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-top d-flex justify-content-between">
                        <h5 class="card-title text-uppercase">Danh sách lộ trình tập của: </h5>
                        <a href="{{ route('admin.exercise-create') }}" class="btn-customize"><i
                                class="bi bi-plus-lg"></i> Thêm mới lộ trình tập</a>
                    </div>
                    <div class="box-list">
                        {{-- 1 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo.jpg" alt="">
                                    <div class="box-action">
                                        <a href="{{ route('admin.package_exercise_detail')}}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Lão luyện</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status">Đang hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- 2 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo2.webp" alt="">
                                    <div class="box-action">
                                        <a href="{{ route('admin.package_exercise_detail')}}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Trung bình</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status">Đang hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo3.png" alt="">
                                    <div class="box-action">
                                        <a href="#" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: nâng cao</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status">Đang hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo.jpg" alt="">
                                    <div class="box-action">
                                        <a href="{{ route('admin.package_exercise_detail')}}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Cơ bản</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status-error">Ngừng hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                           {{-- 1 --}}
                           <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo.jpg" alt="">
                                    <div class="box-action">
                                        <a href="{{ route('admin.package_exercise_detail')}}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Lão luyện</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status">Đang hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- 2 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo2.webp" alt="">
                                    <div class="box-action">
                                        <a href="{{ route('admin.package_exercise_detail')}}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Trung bình</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status-error">Ngừng hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 3 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo3.png" alt="">
                                    <div class="box-action">
                                        <a href={{ route('admin.package_exercise_detail')}} class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: nâng cao</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status">Đang hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <div class="card-custom">
                            <div class="card-body-custom">
                                <div class="image-package">
                                    <img src="assets/backend/img/demo.jpg" alt="">
                                    <div class="box-action">
                                        <a href="#" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                        <a href="#" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn-action delete" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                                <div class="content-package">
                                    <a href="#">Gói tập cơ bản cho người mới</a>
                                    <p>Loại gói tập: Cơ bản</p>
                                    <div class="price-status">
                                        <p class="price">Giá: <span>$150</span></p>
                                        <p class="status-error">Ngừng hoạt động</p>
                                    </div>
                                    <div class="duration">
                                        <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                        <p class="quantity"><i class="bi bi-calendar3"></i> 30d</p>
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
