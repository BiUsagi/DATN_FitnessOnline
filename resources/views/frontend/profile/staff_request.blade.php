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

                        <form id="applyForm" action= "#" class="card" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class="text-secondary text-center pt-3 fst-italic"> *Chọn ô <span class="note">*Không
                                    Đổi*</span> hoặc
                                <span class="note">bỏ
                                    trống</span> trường thông tin nếu bạn không muốn đổi thông tin khi đăng ký làm huấn
                                luyện viên.
                            </p>
                            <div class="card-body">
                                <div class="row align-items-center pt-2 pb-1">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Tên Nhân Viên</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" id="floatingName"
                                                placeholder="name@example.com" />
                                            <label for="floatingName">{{ $data->user_name }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxTenNhanVien"
                                                value="option1"
                                                onclick="toggleInput('floatingName', 'checkboxTenNhanVien')">
                                            <label class="form-check-label" for="checkboxTenNhanVien">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Email</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="floatingEmail"
                                                placeholder="name@example.com" />
                                            <label for="floatingEmail">{{ $data->email }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxEmail"
                                                value="option1" onclick="toggleInput('floatingEmail', 'checkboxEmail')">
                                            <label class="form-check-label" for="checkboxEmail">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Ảnh Đại Diện</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <img class="img-cover img-staff-custom"
                                            src="assets/backend/img/accounts/{{ $data->avatar }}" alt="Avatar"
                                            id="avatar-image" onclick="document.getElementById('avatar-input').click();">
                                        <input type="file" name="image" id="avatar-input" class="form-control"
                                            style="display: none;" onchange="previewImage(event)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxAvatar"
                                                value="option1" onclick="toggleInput('avatar-input', 'checkboxAvatar')">
                                            <label class="form-check-label" for="checkboxAvatar">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Số Điện Thoại</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="phonenumber" id="floatingPhone"
                                                placeholder="name@example.com" />
                                            <label for="floatingPhone">{{ $data->phone_number }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxSoDienThoai"
                                                value="option1"
                                                onclick="toggleInput('floatingPhone', 'checkboxSoDienThoai')">
                                            <label class="form-check-label" for="checkboxSoDienThoai">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Địa Chỉ</h6>
                                    </div>
                                    <div class="col-md-7 pe-5">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="address"
                                                id="floatingAddress" placeholder="name@example.com" />
                                            <label for="floatingAddress">{{ $data->address }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkboxDiaChi"
                                                value="option1"
                                                onclick="toggleInput('floatingAddress', 'checkboxDiaChi')">
                                            <label class="form-check-label" for="checkboxDiaChi">Không Đổi</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Giới Thiệu</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control" name="introduction" style="min-height: 10rem;"
                                            placeholder="Giới thiệu 1 chút về bản thân..."></textarea>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-3 mb-md-0">Hồ Sơ</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input class="form-control " name="file-up" id="formFileLg" type="file" />
                                        <div class="small text-muted mt-2">Tải lên CV/Resume của bạn hoặc bất kì tài liệu
                                            nào liên quan.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="px-5 py-4">
                                    <button type="submit" id="submitButton" class="btn btn-primary">Gửi Hồ Sơ</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection


@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#submitButton').on('click', function(e) {
                e.preventDefault();

                var formData = new FormData(document.getElementById('applyForm'));

                let userid = @json(Auth::user()->id);

                $.ajax({
                    url: "{{ route('submit.application', ['id' => ':id']) }}".replace(':id',
                        userid),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: "Thành công!",
                            text: "Hồ sơ của bạn đã được gửi đi!",
                            icon: "success"
                        }).then(() => {
                            window.location.href =
                                "{{ route('index') }}";
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Có lỗi xảy ra khi gửi hồ sơ.",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function previewImage(event) {
            const image = document.getElementById('avatar-image');
            image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <script>
        function toggleInput(inputId, checkboxId) {
            const inputElement = document.getElementById(inputId);
            const checkboxElement = document.getElementById(checkboxId);
            // Kiểm tra nếu checkbox được chọn
            inputElement.disabled = checkboxElement.checked;
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleInput('floatingName', 'checkboxTenNhanVien');
            toggleInput('floatingEmail', 'checkboxEmail');
            toggleInput('avatar-input', 'checkboxAvatar');
            toggleInput('floatingPhone', 'checkboxSoDienThoai');
            toggleInput('floatingAddress', 'checkboxDiaChi');
        });
    </script>
@endsection
