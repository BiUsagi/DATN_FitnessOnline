@extends('backend/layouts/app-admin')

@section('main')
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
                                        <th>
                                            ID
                                        </th>
                                        <th>Tiêu đề</th>
                                        <th>Tóm tắt</th>
                                        <th>Hình ảnh</th>
                                        <th>Nội dung</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                              
                                <tbody class="show-data">
                                    @foreach($post as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td>{{ $p->title }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->image }}</td>
                                        <td>{!! $p->content !!}</td>
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
        // $.get('http://127.0.0.1:8000/api/admin/post', function(res){
        //     let data = res;
        //     let returnData = '';
        //     data.forEach(item =>{
        //     returnData += `
        //     <tr>
        //         <th scope="row">${item.id}</th>
        //         <td>${item.title}</td>
        //         <td>${item.description}</td>
        //         <td>${item.image}</td>
        //         <td>content</td>
        //         <td>
        //         <a class="btn btn-outline-success" data-bs-placement="top" 
        //         data-bs-title="Xem Chi Tiết">
        //             <i class="ri-eye-fill"></i>
        //         </a>
        //         <a href="admin/posts/update/${item.id}" class="btn btn-outline-primary" data-bs-placement="top" 
        //         data-bs-title="Xem Chi Tiết">
        //             <i class="ri-edit-line"></i>
        //         </a>
        //         <a class="btn btn-outline-danger delete-post" data-bs-placement="top" data-id="${item.id}"
        //         data-bs-title="Xem Chi Tiết">
        //             <i class="ri-error-warning-line"></i>
        //         </a>
        //         </td>
        //     </tr>
        //      `;
        //     });
        //     $('.show-data').html(returnData);
        // });

    // $(document).ready(function() {
    // // Xử lý click cho nút xóa (delete-button)
    //     $('.delete-post').click(function(event) {
    //     event.preventDefault(); // Ngăn chặn hành vi mặc định của link

    //     let confirmation = confirm('Bạn có chắc chắn muốn xóa gói tập này không?');
    //     if (confirmation) {
    //         let button = $(this); // Lấy nút delete được click

    //         // Lấy ID của sản phẩm cần xóa từ data-id của nút (nếu có)
    //         let postId = button.data('id');
    //         if (!postId) {
    //         console.error('Không tìm thấy ID sản phẩm!');
    //         return;
    //         }

    //         // Gửi yêu cầu DELETE đến server
    //         fetch(`/api/admin/post/${postId}`, {
    //         method: 'DELETE',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //         // khi xóa thành công
    //         Swal.fire({
    //             title: "Thành công!",
    //             text: "Xóa gói tập thành công!",
    //             icon: "success"
    //             });
    //         // Xóa element của sản phẩm khỏi giao diện
    //         button.closest('tr').remove();
    //         })
    //         .catch(error => {
    //         // Xử lý khi xóa thất bại
    //         Swal.fire({
    //             title: "Lỗi!",
    //             text: "Có lỗi xảy ra khi xóa gói tập!",
    //             icon: "error"
    //             });
    //         });
    //     }
    //     });

    //     // ... code xử lý các nút khác (detail, edit)
    // });

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