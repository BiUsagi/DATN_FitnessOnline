@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Danh sách nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item active">Người dùng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách người dùng</h5>
                                {{-- <a href="{{ route('admin.create') }}" class="btn-customize"><i class="bi bi-plus-lg"></i>
                                    Thêm nhân viên</a> --}}
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th>Tên</th>
                                        <th>Giới Tính</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Trải Nghiệm</th>
                                        <th class="text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- Lặp hiện thị danh sách nhân viên --}}

                                    @php $stt = 1; @endphp

                                    @foreach ($data as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td class="text-center align-middle">
                                                {{ $stt++ }}
                                            </td>
                                            <td>
                                                {{-- Avatar --}}
                                                <img src="assets/backend/img/{{ $item->avatar }}"
                                                    class="rounded-circle object-fit-cover me-2 avatar-table">
                                                {{-- name --}}
                                                {{ $item->user_name }}
                                            </td>
                                            <td class="align-middle ">
                                                @if ($item->gender == 1)
                                                    <i class="bi bi-gender-male text-primary"></i> Nam
                                                @elseif ($item->gender == 0)
                                                    <i class="bi bi-gender-female text-danger"></i> Nữ
                                                @elseif ($item->gender == 2)
                                                    <i class="bi bi-gender-trans text-warning"></i> Khác
                                                @else
                                                    <i class="bi bi-gender-trans text-secondary"></i> Chưa xác định
                                                @endif
                                            </td>
                                            {{-- sdt --}}
                                            <td class="align-middle">{{ $item->phone_number }}</td>
                                            {{-- email --}}
                                            <td class=" align-middle">{{ $item->email }}</td>
                                            {{-- Trải nghiệm --}}
                                            <td class=" align-middle text-center">{{ $item->trial }} ngày</td>
                                            <td class="text-center align-middle">
                                                {{-- xem --}}
                                                <a href="{{ route('admin.customer.info', ['id' => $item->id]) }}"
                                                    class="btn btn-info text-white" data-bs-placement="top"
                                                    data-bs-title="Xem Chi Tiết">
                                                    <i class="ri-eye-fill"></i>
                                                </a>
                                                {{-- sua --}}
                                                <button type="button" class="btn btn-warning text-white"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                    onclick="editUser({{ $item->id }})" data-bs-placement="top"
                                                    data-bs-title="Chỉnh Sửa"><i class="ri-edit-box-line"></i></button>
                                                {{-- hạn chế --}}
                                                <button type="button" class="btn btn-danger" data-bs-placement="top"
                                                    data-bs-title="Hạn Chế Tài Khoản Này"><i
                                                        class="ri-error-warning-line"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Chỉnh Sửa Thông Tin Người Dùng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editUserForm">
                                @csrf <!-- CSRF token -->
                                <input type="hidden" id="userId" name="userId">
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Tên</label>
                                    <input type="text" class="form-control" id="userName" name="userName">
                                </div>
                                <!-- giới tính -->
                                <div class="mb-3">
                                    <label for="userGender" class="form-label">Giới Tính</label>
                                    <select class="form-control" id="userGender" name="userGender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="userEmail" name="userEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="userPhone" class="form-label">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id="userPhone" name="userPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="userBirthday" class="form-label">Ngày Sinh</label>
                                    <input type="date" class="form-control" id="userBirthday" name="userBirthday">
                                </div>
                                <div class="mb-3">
                                    <label for="userAddress" class="form-label">Địa Chỉ</label>
                                    <input type="text" class="form-control" id="userAddress" name="userAddress">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" id="saveChangesBtn"
                                        onclick="updateUser()">Lưu
                                        Thay Đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->
@endsection



@section('custom_js')
    <script>
        // load dữ liệu vào modal
        function editUser(userId) {
            $.ajax({
                url: "{{ route('api.user.show', '') }}" + '/' + userId,
                type: 'GET',
                success: function(response) {
                    // console.log(response)

                    // Đổ dữ liệu vào các trường trong modal
                    $('#userId').val(response.id);
                    $('#userName').val(response.user_name);
                    $('#userGender').val(response.gender);
                    $('#userEmail').val(response.email);
                    $('#userBirthday').val(response.birthday);
                    $('#userPhone').val(response.phone_number);
                    $('#userAddress').val(response.address);
                },
                error: function(error) {
                    console.log(error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            });

        }

        function updateUser() {
            // Thu thập dữ liệu từ form
            var formData = {
                user_name: $('#userName').val(),
                gender: $('#userGender').val(),
                email: $('#userEmail').val(),
                phone_number: $('#userPhone').val(),
                birthday: $('#userBirthday').val(),
                address: $('#userAddress').val(),
                _token: $('input[name="_token"]').val()
            };


            // Lấy ID người dùng từ hidden input
            var userId = $('#userId').val();

            // Gửi yêu cầu AJAX
            $.ajax({
                url: "{{ route('api.user.update', '') }}" + '/' + userId,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('#editUserModal').modal('hide');
                    Swal.fire({
                        title: "Thành công!",
                        text: "Cập nhật thông tin người dùng thành công!",
                        icon: "success"
                    });

                    // Cập nhật thông tin trên bảng nếu có
                    $('tr').each(function() {

                        var rowId = $(this).data('id'); // Lấy giá trị data-id từ thẻ tr

                        // Kiểm tra nếu ID của hàng trùng với response.id
                        if (rowId == response.id) {

                            // Cập nhật Avatar và tên người dùng
                            $(this).find('td:eq(1)').html(`
                                <img src="assets/backend/img/${response.avatar}" class="rounded-circle object-fit-cover me-2 avatar-table">
                                ${response.user_name}
                            `);

                            // Cập nhật giới tính với icon và màu sắc tương ứng
                            let genderHtml = '';
                            if (response.gender == 1) {
                                genderHtml = '<i class="bi bi-gender-male text-primary"></i> Nam';
                            } else if (response.gender == 0) {
                                genderHtml = '<i class="bi bi-gender-female text-danger"></i> Nữ';
                            } else if (response.gender == 2) {
                                genderHtml = '<i class="bi bi-gender-trans text-warning"></i> Khác';
                            } else {
                                genderHtml =
                                    '<i class="bi bi-gender-trans text-secondary"></i> Chưa xác định';
                            }
                            // Cập nhật giới tính
                            $(this).find('td:eq(2)').html(genderHtml);

                            // Cập nhật số điện thoại
                            $(this).find('td:eq(3)').text(response.phone_number);

                            // Cập nhật email
                            $(this).find('td:eq(4)').text(response.email);

                            // Cập nhật số ngày trải nghiệm
                            $(this).find('td:eq(5)').text(`${response.trial} ngày`);
                        }
                    });
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra khi cập nhật thông tin người dùng.",
                        icon: "error"
                    });
                }
            });
        }


        // khởi tạo tooltip để hiện thị chú thích cho nút trên bảng
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-title]'));
            // Kết quả trả về là một NodeList .
            //[].slice.call(...) là một kỹ thuật để chuyển đổi NodeList thành một mảng bằng cách sử dụng phương thức slice() của mảng.
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                // Phương thức map sẽ lặp qua từng phần tử trong mảng tooltipTriggerList
                //Đối với mỗi phần tử, một đối tượng Tooltip mới từ Bootstrap sẽ được khởi tạo.
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
