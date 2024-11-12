@extends('frontend/layouts/app-user')


@section('custom_css')
    <style>
        .img-staff-custom {
            width: 8rem;
            height: 8rem;
            border-radius: 50%;
        }

        .note {
            color: red;

        }
    </style>
@endsection

@section('main')
    <section>

        <!-- BREADCRUMB START HERE -->
        <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1>ĐĂNG KÝ<span> HUẤN LUYỆN VIÊN</span></h1>
                    <div class="trackPage">
                        <a href="{{ route('index') }}">Trang Chủ</a>
                        <span> ĐĂNG KÝ HUẤN LUYỆN VIÊN</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB END'S HERE -->
        <section class="pb-5 pt-5" style="background-color: #212529;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                        <div class="heading text-center p-5">
                            <h3>Thông Tin <span>Cá Nhân</span></h3>
                        </div>

                        <div class="card">
                            <p class="text-secondary text-center pt-3 fst-italic"> *Chọn ô <span class="note">*Không
                                    Đổi*</span> hoặc
                                <span class="note">bỏ
                                    trống</span> trường thông tin nếu bạn không muốn đổi thông tin khi đăng ký làm huấn
                                luyện viên.
                            </p>
                            <div class="card-body">
                                <div class="row align-items-center pt-2 pb-1">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Tên Nhân Viên</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingName"
                                                placeholder="name@example.com" />
                                            <label for="floatingName">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxTenNhanVien"
                                                value="option1">
                                            <label class="form-check-label" for="checkboxTenNhanVien">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingEmail"
                                                placeholder="name@example.com" />
                                            <label for="floatingEmail">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxEmail"
                                                value="option1">
                                            <label class="form-check-label" for="checkboxEmail">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Ảnh Đại Diện</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <img class="img-cover img-staff-custom" src="assets/backend/img/no-image.jpg"
                                            alt="Avatar" id="avatar-image"
                                            onclick="document.getElementById('avatar-input').click();">
                                        <input type="file" name="image" id="avatar-input" class="form-control"
                                            style="display: none;" onchange="previewImage(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxAvatar"
                                                value="option1">
                                            <label class="form-check-label" for="checkboxAvatar">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Số Điện Thoại</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPhone"
                                                placeholder="name@example.com" />
                                            <label for="floatingPhone">Số Điện Thoại</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxSoDienThoai"
                                                value="option1">
                                            <label class="form-check-label" for="checkboxSoDienThoai">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Địa Chỉ</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingAddress"
                                                placeholder="name@example.com" />
                                            <label for="floatingAddress">Số Điện Thoại</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxDiaChi"
                                                value="option1">
                                            <label class="form-check-label" for="checkboxDiaChi">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Giới Thiệu</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control" style="min-height: 10rem;" placeholder="Message sent to the employer"></textarea>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Hồ Sơ</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input class="form-control " id="formFileLg" type="file" />
                                        <div class="small text-muted mt-2">Tải lên CV/Resume của bạn hoặc bất kì tài liệu
                                            nào liên quan.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <button type="submit" class="btn btn-primary ">Gửi Hồ Sơ</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection


@section('custom_js')
    <script>
        function previewImage(event) {
            const image = document.getElementById('avatar-image');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
