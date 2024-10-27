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
                                    <input type="text" class="form-control-customize" id="inputName" name="staff_name"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="inputPhone" class="form-label-customize">Số điện thoại <span
                                            class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputPhone" name="staff_phone"
                                        required>
                                </div>

                                <div class="col-12">
                                    <label for="inputEmail" class="form-label-customize">Email <span
                                            class="note">(*)</span></label>
                                    <input type="email" class="form-control-customize" id="inputEmail" name="staff_email"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="inputGender" class="form-label-customize">Giới Tính</label>
                                    <select class="form-control" id="inputGender" name="staff_gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Khác</option>
                                        <option value="3">Không xác định</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputBirthday" class="form-label-customize">Ngày sinh <span
                                            class="note">(*)</span></label>
                                    <input type="date" class="form-control-customize" id="inputBirthday"
                                        name="staff_birthday" required>
                                </div>



                                <div class="col-12">
                                    <label for="inputAddress" class="form-label-customize">Địa chỉ <span
                                            class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputAddress"
                                        name="staff_address" required>
                                </div>

                                <div class="col-12">
                                    <label for="inputDescription" class="form-label-customize">Giới thiệu <span
                                            class="note">(*)</span></label>
                                    <textarea type="text" class="form-control-customize textarea-custom" id="inputDescription" name="description"></textarea>
                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-header text-uppercase">HÌNH ẢNH</div>
                            <div class="card">
                                <div class="card-body">
                                    <img class="img-cover" src="assets/backend/img/no-image.jpg" alt="Avatar"
                                        id="avatar-image"
                                        style="cursor: pointer; max-width: 100%; height: 170px; object-fit: cover;"
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
                    $('#avatar-image').attr('src', 'assets/backend/img/' + response.avatar);
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
        // $('#form-update-staff').on('submit', function(e) {
        //     e.preventDefault();

        //     // let avatarFile = $('#avatar-input')[0].files[0];
        //     let formData = $(this).serialize();
        //     let staffId = $('#inputId').val();


        //     $.ajax({
        //         url: "{{ route('api.staff.update', '') }}" + '/' + staffId,
        //         type: 'PUT',
        //         data: formData,
        //         success: function(response) {
        //             Swal.fire({
        //                 title: "Thành công!",
        //                 text: "Cập nhật thông tin người dùng thành công!",
        //                 icon: "success"
        //             }).then(() => {
        //                 window.location.href = "{{ route('admin.staff') }}";
        //             });

        //         },
        //         error: function(error) {
        //             console.log(error);
        //             Swal.fire({
        //                 title: "Lỗi!",
        //                 text: "Có lỗi xảy ra khi cập nhật thông tin nhân viên.",
        //                 icon: "error"
        //             });
        //         }
        //     });

        // });

        $('#form-update-staff').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let staffId = $('#inputId').val();
            // console.log('Dữ liệu gửi lên:', Object.fromEntries(formData));
            $.ajax({
                url: "{{ route('api.staff.update', '') }}" + '/' + staffId,
                type: 'PUT',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Cập nhật thông tin người dùng thành công!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = "{{ route('admin.staff') }}";
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
