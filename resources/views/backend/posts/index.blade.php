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
                                        <th style="text-align: left; word-wrap: break-word">Tiêu đề</th>
                                        <th style="text-align: left; word-wrap: break-word">Tóm tắt</th>
                                        <th style="text-align: left; word-wrap: break-word">Hình ảnh</th>
                                        <!-- <th style="text-align: left; word-wrap: break-word">Nội dung</th> -->
                                        <th style="ext-align: left; word-wrap: break-word">Hành động</th>
                                    </tr>
                                </thead>
                              
                                <tbody class="show-data">
                                    @foreach($post as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td  class="truncated-text ">{{ $p->title }}</td>
                                        <td  class="truncated-text">{{ $p->description }}</td>
                                        <td  class="truncated-text"><img src="uploads/post_image/{{ $p->image }}" alt="" width="90px" height="90px"></td>
                                        <!-- <td  class="truncated-text">{!! $p->content !!}</td> -->
                                        <td class="customize-width">
                                            <a class="btn-custom primary" data-bs-placement="top" 
                                            data-bs-title="Xem Chi Tiết">
                                            <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="admin/posts/update/{{ $p->id }}" class="btn-custom success ms-1 me-1" data-bs-placement="top" 
                                            data-bs-title="Xem Chi Tiết">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a class="btn-custom danger delete-post" data-bs-placement="top" data-id="{{ $p->id }}"
                                            data-bs-title="Xem Chi Tiết">
                                                <i class="bi bi-trash"></i>
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

         <!-- Modal -->
        <div class="modal fade" id="exerciseDetailModal" tabindex="-1" aria-labelledby="exerciseDetailLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exerciseDetailLabel">Chi tiết bài viết</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tiêu đề:</strong> <span id="post-title"></span></p>
                        <p><strong>Tóm tắt:</strong> <span id="post-description"></span></p>

                        <p><strong>Hình ảnh:</strong></p>
                        <div id="post-image" class="text-center">
                            <!-- Ảnh sẽ được thêm vào đây -->
                        </div>

                        <p><strong>Nội dung:</strong> <span id="post-content"></span></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

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

        //Xem chi tiết
        $(document).ready(function() {
            // Xử lý click nút con mắt
            $('.btn-custom.primary').click(function(event) {
                event.preventDefault();

                const postId = $(this).closest('tr').find('.delete-post').data('id');

                fetch(`/api/admin/post/${postId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Hiển thị dữ liệu lên modal
                        $('#post-title').text(data.title);
                        $('#post-description').text(data.description || 'Không có mô tả');
                        $('#post-content').html(data.content);
                        

                        // Hiển thị hình ảnh
                        const imageContainer = $('#post-image');
                        imageContainer.empty(); // Xóa nội dung cũ nếu có

                        // Hiển thị ảnh nếu tồn tại
                        if (data.image) {
                            imageContainer.append(`
                                <img src="uploads/post_image/${data.image}" alt="Hình minh họa" style="width: 350px; height: auto; border-radius: 8px;">
                            `);
                        } else {
                            imageContainer.append('<p>Không có hình ảnh minh họa.</p>');
                        }

                        // Mở modal
                        $('#exerciseDetailModal').modal('show');
                    })
                    .catch(error => {
                        Swal.fire(
                            'Lỗi!',
                            'Không thể tải chi tiết bài viết.',
                            'error'
                        );
                    });
            });
        });
    </script>
@endsection