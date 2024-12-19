@extends('backend/layouts/app-admin')

@section('main')
<style>
    .truncated-text {


}
</style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Quản lý bài viết</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý bài viết</li>
                <li class="breadcrumb-item active">Danh sách bài viết</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách bài viết</h5>
                                <a href="{{ route('admin.post-create') }}" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm bài viết</a>
                            </div>
                            
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;text-align: left; word-wrap: break-word">
                                            ID
                                        </th>
                                        <th style="width: 25%;text-align: left; word-wrap: break-word">Tiêu đề</th>
                                        <th style="width: 20%;text-align: left; word-wrap: break-word">Tóm tắt</th>
                                        <th style="width: 10%;text-align: left; word-wrap: break-word">Hình ảnh</th>
                                        <th style="width: 30%;text-align: left; word-wrap: break-word">Nội dung</th>
                                        <th style="width: 5%;text-align: left; word-wrap: break-word">Hành động</th>
                                    </tr>
                                </thead>
                              
                                <tbody class="show-data">
                                    @foreach($post as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td  class="truncated-text ">{{ $p->title }}</td>
                                        <td  class="truncated-text">{{ $p->description }}</td>
                                        <td  class="truncated-text">{{ $p->image }}</td>
                                        <td  class="truncated-text">{!! $p->content !!}</td>
                                        <td>
                                        <a class="btn btn-outline-success" data-bs-placement="top" 
                                        data-bs-title="Xem Chi Tiết">
                                            <i class="ri-eye-fill"></i>
                                        </a>
                                        <a href="admin/posts/update/{{ $p->id }}" class="btn btn-outline-primary" data-bs-placement="top" 
                                        data-bs-title="Xem Chi Tiết">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <a class="btn btn-outline-danger delete-post" data-bs-placement="top" data-id="{{ $p->id }}"
                                        data-bs-title="Xem Chi Tiết">
                                            <i class="ri-error-warning-line"></i>
                                        </a>
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
        </section>

    </main>
    <script>
    $(document).ready(function() {
        // Xử lý click cho nút xóa (delete-button)
        $('.delete-post').click(function(event) {
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

                fetch(`/api/admin/post/${postId}`, {
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