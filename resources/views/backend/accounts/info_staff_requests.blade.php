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
                        <div class="title-top">
                            <h5 class="card-title text-uppercase ps-4">Chi tiết hồ sơ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-6">
                                <div class="title-top">
                                    <h5 class="card-title text-uppercase text-center">Thông Tin Khách Hàng</h5>
                                </div>
                                <div class="mb-3">
                                    <strong>Tên Khách Hàng:</strong>
                                    <p>Nguyễn Văn A</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong>
                                    <p>nguyenvana@example.com</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Số Điện Thoại:</strong>
                                    <p>0123456789</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Địa Chỉ:</strong>
                                    <p>123 Đường ABC, Quận 1, TP.HCM</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Ảnh Đại Diện:</strong>
                                    <img src="assets/backend/img/accounts/avatar_old.jpg" alt="Old Avatar"
                                        class="img-fluid">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="title-top">
                                    <h5 class="card-title text-uppercase text-center">Thông Tin Nhân Viên</h5>
                                </div>
                                <div class="mb-3">
                                    <strong>Tên Nhân Viên:</strong>
                                    <p>Nguyễn Văn B</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Email:</strong>
                                    <p>nguyenvanb@example.com</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Số Điện Thoại:</strong>
                                    <p>0987654321</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Địa Chỉ:</strong>
                                    <p>456 Đường XYZ, Quận 2, TP.HCM</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Ảnh Đại Diện:</strong>
                                    <img src="assets/backend/img/accounts/avatar_new.jpg" alt="New Avatar"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="title-top">
                            <h5 class="card-title text-uppercase ps-4">Tệp đính kèm</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <a href="assets/backend/docs/certificate.pdf" target="_blank">Chứng chỉ</a>
                                </li>
                                <li>
                                    <a href="assets/backend/docs/cv.docx" target="_blank">CV</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
