@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Danh sách đơn đăng ký</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item ">Kiếm duyệt hồ sơ</li>
                    <li class="breadcrumb-item active">Chi tiết hồ sơ</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="title-top d-flex justify-content-between align-items-center">
                            <h5 class="card-title text-uppercase ps-4 m-0">Chi tiết hồ sơ</h5>

                            @if ($staff->status == 0)
                                <div class="pe-4 d-flex gap-2">
                                    <button class="btn btn-outline-success"
                                        onclick="approveRequest({{ $staff->id }})">Phê duyệt</button>
                                    <button class="btn btn-outline-danger" onclick="rejectRequest({{ $staff->id }})">Từ
                                        chối</button>
                                </div>
                            @elseif ($staff->status == 1)
                                <p class="text-success pe-4 m-0">Đã duyệt vào ngày: 01-11-2024</p>
                            @elseif ($staff->status == 2)
                                <p class="text-danger pe-4 m-0">Bị từ chối vào ngày: 01-11-2024</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <div class="title-top">
                                    <h5 class="card-title text-uppercase text-center">Thông Tin Khách Hàng</h5>
                                </div>
                                <div class="mb-5 d-flex justify-content-center">
                                    <img src="assets/backend/img/accounts/{{ $user->avatar }}" alt="Old Avatar"
                                        class="img-fluid request-avatar-custom">
                                </div>
                                <div class="mb-3">
                                    <strong>Tên Khách Hàng:</strong>
                                    <p>{{ $user->user_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Số Điện Thoại:</strong>
                                    <p>{{ $user->phone_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Địa Chỉ:</strong>
                                    <p>{{ $user->address }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="title-top">
                                    <h5 class="card-title text-uppercase text-center">Thông Tin Nhân Viên</h5>
                                </div>
                                <div class="mb-5 d-flex justify-content-center">
                                    <img src="assets/backend/img/accounts/{{ $staff->new_avatar }}" alt="New Avatar"
                                        class="img-fluid request-avatar-custom">
                                </div>
                                <div class="mb-3">
                                    <strong>Tên Nhân Viên:</strong>
                                    <p>{{ $staff->new_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong>
                                    <p>{{ $staff->new_email }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Số Điện Thoại:</strong>
                                    <p>{{ $staff->new_phone_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Địa Chỉ:</strong>
                                    <p>{{ $staff->new_address }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card  col-12">
                        <div class="title-top">
                            <h5 class="card-title text-uppercase ps-4">Giới thiệu</h5>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $staff->introduction }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 row">
                    <div class="card col-12">
                        <div class="title-top">
                            <h5 class="card-title text-uppercase ps-2">Tệp đính kèm</h5>
                        </div>
                        <div class="card-body">
                            <a href="uploads/cv_resume/{{ $staff->certificate }}"
                                class="btn btn-primary d-flex justify-content-center mb-3" target="_blank">Xem trong trang
                                mới</a>
                            <div>
                                <iframe src="uploads/cv_resume/{{ $staff->certificate }}" width="100%"
                                    height="550px"></iframe>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });



        function approveRequest(id) {
            Swal.fire({
                title: "Bạn có chắc chắn muốn phê duyệt yêu cầu này không?",
                text: "Sau khi phê duyệt, bạn sẽ không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Phê duyệt",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "{{ route('api.staffrequests.approve', ['id' => ':id']) }}".replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Đã phê duyệt!",
                                text: "Yêu cầu đã được phê duyệt thành công.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: "Lỗi!",
                                text: "Có lỗi xảy ra khi phê duyệt yêu cầu.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        function rejectRequest(id) {
            Swal.fire({
                title: "Bạn có chắc chắn muốn từ chối yêu cầu này không?",
                text: "Sau khi từ chối, bạn sẽ không thể hoàn tác!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Từ chối",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = "{{ route('api.staffrequests.reject', ['id' => ':id']) }}".replace(':id', id);

                    $.ajax({
                        url: url,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Đã từ chối!",
                                text: "Yêu cầu đã bị từ chối.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                title: "Lỗi!",
                                text: "Có lỗi xảy ra khi từ chối yêu cầu.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
