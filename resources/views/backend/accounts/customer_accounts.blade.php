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
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th class="text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- Lặp hiện thị danh sách nhân viên --}}

                                    @php $stt = 1; @endphp

                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $stt++ }}
                                            </td>
                                            <td>
                                                {{-- Avatar --}}
                                                <img src="assets/backend/img/{{ $item->avatar }}"
                                                    class="rounded-circle object-fit-cover me-2 avatar-table">
                                                {{-- name --}}
                                                {{ $item->user_name }}

                                            </td>
                                            {{-- sdt --}}
                                            <td class="align-middle">{{ $item->phone_number }}</td>
                                            {{-- email --}}
                                            <td class=" align-middle">{{ $item->email }}</td>
                                            <td class="text-center align-middle">
                                                {{-- xem --}}
                                                <a href="{{ route('admin.customer.info', ['id' => $item->id]) }}"
                                                    class="btn btn-info text-white">
                                                    <i class="ri-eye-fill"></i>
                                                </a>
                                                {{-- sua --}}
                                                <button type="button" class="btn btn-warning text-white"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal"
                                                    onclick="editUser({{ $item->id }})"><i
                                                        class="ri-edit-box-line"></i></button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="ri-delete-bin-5-line"></i></button>
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
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="userEmail" name="userEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="userPhone" class="form-label">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id="userPhone" name="userPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="userAddress" class="form-label">Địa Chỉ</label>
                                    <input type="text" class="form-control" id="userAddress" name="userAddress">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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


<script>
    // Function để load dữ liệu vào modal
    function editUser(userId) {
        $.ajax({
            url: "{{ route('admin.customer.edit', '') }}" + '/' + userId,
            type: 'GET',
            success: function(response) {
                // Đổ dữ liệu vào các trường trong modal
                $('#userId').val(response.id);
                $('#userName').val(response.user_name);
                $('#userEmail').val(response.email);
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
        var formData = {
            id: $('#userId').val(),
            user_name: $('#userName').val(),
            email: $('#userEmail').val(),
            phone_number: $('#userPhone').val(),
            address: $('#userAddress').val(),
            _token: $('input[name="_token"]').val() // Thêm CSRF token vào dữ liệu
        };

        $.ajax({
            url: "{{ route('admin.customer.update') }}", // Đường dẫn API để cập nhật dữ liệu
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                $('#editUserModal').modal('hide');
                toastr.success('Cập nhật thành công!');

                // Cập nhật thông tin trong bảng
                $('tr').each(function() {
                    if ($(this).find('td:eq(0)').text().trim() == response.id) {
                        $(this).find('td:eq(1)').html(`
                            <img src="assets/backend/img/${response.avatar}"  class="rounded-circle object-fit-cover me-2 avatar-table">
                            ${response.user_name}
                        `);
                        $(this).find('td:eq(2)').text(response.phone_number);
                        $(this).find('td:eq(3)').text(response.email);
                    }
                });
            },
            error: function(error) {
                console.log(error);
                toastr.error('Cập nhật thất bại. Vui lòng thử lại.');
            }
        });
    };
</script>
