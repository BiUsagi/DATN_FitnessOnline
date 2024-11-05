@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí bài tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí bài tập</li>
                    <li class="breadcrumb-item active">Danh sách bài tập</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách bài tập</h5>
                                <a href="{{ route('admin.exercise-create') }}" class="btn-customize"><i
                                        class="bi bi-plus-lg"></i> Thêm bài tập</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên bài tập</th>
                                        <th>Mô tả</th>
                                        <th>Số set</th>
                                        <th>Số rep</th>
                                        <!-- <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list-items"></tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        </main><!-- End #main -->
    <script>
        
        $.get('http://127.0.0.1:8000/api/admin/exercises', function(res) {
                let data = res;                
                console.log(res);
                let returnData = '';

                
                data.forEach(item => {
                    returnData += `
                     <tr>

                        <td>${item.id}</td>
                                    <td>${item.name}</td>
                                    <td>${item.description}</td>
                                    <td>${item.sets}</td>
                                    <td>${item.reps}</td>
                                    <td class="customize-width">
                                        <a href="" class="btn-custom primary" ><i class="bi bi-eye-fill"></i></a>    
                                        <a href="admin/exercise/update/${item.id}" class="btn-custom success" ><i class="bi bi-pencil-square"></i></a>   
                                        <a href="" class="btn-custom danger delete-exercise" data-id="${item.id}" ><i class="bi bi-trash"></i></a>    
                                    </td>
                                </tr>
               `;
                });
                $('#list-items').html(returnData);
            }
        )

        $(document).ready(function() {
        // Xử lý click cho nút xóa (delete-button)
        $('.delete-exercise').click(function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của link

            Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa bài viết này không?',
            text: "Hành động này không thể khôi phục!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
            }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng  xác nhận, thực hiện xóa
                let button = $(this);
                let postId = button.data('id');

                fetch(`/api/admin/exercises/${postId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                })
                .then(response => response.json())
                .then(data => {
                Swal.fire(
                    'Đã xóa!',
                    'Bài viết đã được xóa thành công.',
                    'success'
                )
                button.closest('tr').remove();
                })
                .catch(error => {
                Swal.fire(
                    'Lỗi!',
                    'Có lỗi xảy ra khi xóa bài viết.',
                    'error'
                )
                });
            }
            })
        });
        });
    </script>
@endsection
