@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Thông tin nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item">Nhân viên</li>
                    <li class="breadcrumb-item ">Chi tiết</li>
                    <li class="breadcrumb-item active">Chỉnh sửa thông tin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <form action= "#" id="form-update-staff" method ="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9">

                        <div class="card">
                            <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                            <div class="card-body">

                                <input type="hidden" id="inputId" name="staff_id">
                                <div class="col-12">
                                    <label for="inputName" class="form-label-customize">Tên nhân viên <span
                                            class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputName" name="staff_name">
                                </div>
                                <div class="col-12">
                                    <label for="inputPhone" class="form-label-customize">Số điện thoại </label>
                                    <input type="text" class="form-control-customize" id="inputPhone" name="staff_phone">
                                </div>

                                <div class="col-12">
                                    <label for="inputEmail" class="form-label-customize">Email <span
                                            class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputEmail" name="staff_email">
                                </div>
                                <div class="col-12">
                                    <label for="inputGender" class="form-label-customize">Giới Tính</label>
                                    <select class="form-control" id="inputGender" name="staff_gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputBirthday" class="form-label-customize">Ngày sinh </label>
                                    <input type="date" class="form-control-customize" id="inputBirthday"
                                        name="staff_birthday">
                                </div>



                                <div class="col-12">
                                    <label for="inputAddress" class="form-label-customize">Địa chỉ </label>
                                    <input type="text" class="form-control-customize" id="inputAddress"
                                        name="staff_address">
                                </div>

                                <div class="col-12">
                                    <label for="inputDescription" class="form-label-customize">Giới thiệu </label>
                                    <textarea type="text" class="form-control-customize textarea-custom" id="inputDescription" name="description"></textarea>
                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-header text-uppercase">HÌNH ẢNH</div>
                            <div class="card">
                                <div class="card-body card-body-custom-staff d-flex justify-content-center mt-3">
                                    <img class="img-update-custom rounded-circle"
                                        src="assets/backend/img/accounts/no-image.jpg" alt="Avatar" id="avatar-image"
                                        style="cursor: pointer;  object-fit: cover;"
                                        onclick="document.getElementById('avatar-input').click();">
                                    <input type="file" name="avatar" id="avatar-input" class="form-control"
                                        style="display: none;" onchange="previewImage(event)">
                                </div>
                                <script>
                                    function previewImage(event) {
                                        const image = document.getElementById('avatar-image');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    }
                                </script>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Lưu thông tin">

                    </div>
                </div>
                </div>
            </form>
        </section>

    </main><!-- End #main -->
@endsection


@section('custom_js')
    <script>
        getStaff();

        function getIdFromUrl() {
            const urlParts = window.location.pathname.split('/');
            const id = urlParts[urlParts.length - 1];
            return id;
        }

        function getStaff() {
            const staffId = getIdFromUrl();

            $.ajax({
                url: "{{ route('api.staff.show', '') }}" + '/' + staffId,
                type: 'GET',
                success: function(response) {
                    $('#inputId').val(response.id);
                    $('#inputName').val(response.staff_name);
                    $('#inputGender').val(response.gender);
                    $('#inputEmail').val(response.email);
                    $('#inputBirthday').val(response.birthday);
                    $('#inputPhone').val(response.phone_number);
                    $('#inputAddress').val(response.address);
                    $('#inputDescription').text(response.introduction);
                    $('#avatar-image').attr('src', 'assets/backend/img/accounts/' + response.avatar);
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra.",
                        icon: "error"
                    });
                }
            })


        }
    </script>


    <script>
        function validateUpdateStaffForm() {
            const staffName = $('#inputName').val().trim();
            const staffEmail = $('#inputEmail').val().trim();
            const phoneRegex = /^0[0-9]{9,10}$/;

            if (!staffName) {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Tên nhân viên không được để trống.",
                    icon: "error"
                });
                return false;
            }

            // Kiểm tra số điện thoại
            const staffPhone = $('#inputPhone').val().trim();
            if (staffPhone && !phoneRegex.test(staffPhone)) {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Số điện thoại phải bắt đầu bằng số 0 và có 10-11 chữ số.",
                    icon: "error"
                });
                return false;
            }

            if (!staffEmail) {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Email không được để trống.",
                    icon: "error"
                });
                return false;
            }

            // Kiểm tra định dạng email
            if (!/^\S+@\S+\.\S+$/.test(staffEmail)) {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Email không hợp lệ.",
                    icon: "error"
                });
                return false;
            }



            return true;
        }


        async function isEmailUnique(email) {
            try {
                const response = await $.ajax({
                    url: "{{ route('api.staff.checkEmail') }}",
                    type: "GET",
                    data: {
                        email: email
                    }
                });
                return response.isUnique; // API trả về `isUnique: true/false`
            } catch (error) {
                console.log(error);
                Swal.fire({
                    title: "Lỗi!",
                    text: "Không thể kiểm tra email. Vui lòng thử lại.",
                    icon: "error"
                });
                return false;
            }
        }


        $('#form-update-staff').on('submit', async function(e) {
            e.preventDefault();


            if (!validateUpdateStaffForm()) {
                return; // Dừng lại nếu form không hợp lệ
            }

            const staffEmail = $('#inputEmail').val().trim();
            const isUnique = await isEmailUnique(staffEmail);
            if (!isUnique) {
                Swal.fire({
                    title: "Lỗi!",
                    text: "Email này đã được sử dụng. Vui lòng chọn email khác.",
                    icon: "error"
                });
                return; // Dừng lại nếu email không unique
            }


            let formData = new FormData(this);
            formData.append('_method', 'PUT');
            let staffId = $('#inputId').val();

            $.ajax({
                url: "{{ route('api.staff.update', '') }}" + '/' + staffId,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Cập nhật thông tin nhân viên thành công!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = "{{ route('admin.staff.info', '') }}" + '/' +
                            staffId;
                    });
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra khi cập nhật thông tin nhân viên.",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endsection
