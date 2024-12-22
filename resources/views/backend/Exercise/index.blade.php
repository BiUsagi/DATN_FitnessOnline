@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí bài tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí bài tập</li>


                    @if (auth()->user()->hasRole('admin'))
                        <li class="breadcrumb-item active">Tất bài tập</li>
                    @elseif(auth()->user()->hasRole('staff'))
                        <li class="breadcrumb-item active">Danh sách bài tập của: {{ Auth::user()->user_name }}</li>
                    @endif
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                @if (auth()->user()->hasRole('admin'))
                                    <h5 class="card-title text-uppercase">Tất bài tập</h5>
                                @elseif(auth()->user()->hasRole('staff'))
                                    <h5 class="card-title text-uppercase">Danh sách bài tập của:
                                        {{ Auth::user()->user_name }}
                                    </h5>
                                    <a href="{{ route('admin.exercise-create') }}" class="btn-customize"><i
                                            class="bi bi-plus-lg"></i> Thêm bài tập</a>
                                @endif

                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên bài tập</th>
                                        <th>Số set</th>
                                        <th>Số rep</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list-items">
                                    @foreach ($data as $ex)
                                        <tr>
                                            <td>{{ $ex->id }}</td>
                                            <td>{{ $ex->name }}</td>
                                            <td>{{ $ex->sets }}</td>
                                            <td>{{ $ex->reps }}</td>
                                            <td class="customize-width">
                                                <a href="" class="btn-custom primary"><i
                                                        class="bi bi-eye-fill"></i></a>

                                                <a href="admin/exercise/update/{{ $ex->id }}"
                                                    class="btn-custom success"><i class="bi bi-pencil-square"></i></a>

                                                <a href="" class="btn-custom danger delete-exercise"
                                                    data-id="{{ $ex->id }}"><i class="bi bi-trash"></i></a>
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

    </main><!-- End #main -->

    <!-- Modal -->
    <div class="modal fade" id="exerciseDetailModal" tabindex="-1" aria-labelledby="exerciseDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exerciseDetailLabel">Chi tiết bài tập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Tên bài tập:</strong> <span id="exercise-name"></span></p>
                    <p><strong>Số set:</strong> <span id="exercise-sets"></span></p>
                    <p><strong>Số rep:</strong> <span id="exercise-reps"></span></p>

                    <p><strong>Video hướng dẫn:</strong></p>
                    <div id="exercise-videos" class="d-flex gap-3 justify-content-center">
                        
                    </div>

                    <p><strong>Hướng dẫn tập:</strong> <span id="exercise-description"></span></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Xóa
        $(document).ready(function() {
            // Xử lý click cho nút xóa (delete-button)
            $('.delete-exercise').click(function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của link

                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa bài tập này không?',
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
                                    'Bài tập   đã được xóa thành công.',
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

                const exerciseId = $(this).closest('tr').find('.delete-exercise').data('id');

                fetch(`/api/admin/exercises/${exerciseId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Hiển thị dữ liệu lên modal
                        $('#exercise-name').text(data.name);
                        $('#exercise-description').html(data.description || 'Không có mô tả');
                        $('#exercise-sets').text(data.sets);
                        $('#exercise-reps').text(data.reps);

                        // Hiển thị video
                        const videoContainer = $('#exercise-videos');
                        videoContainer.empty(); // Xóa nội dung cũ nếu có

                        // Hiển thị video 1
                        if (data.video_1) {
                            videoContainer.append(`
                                <video controls style="width: 350px; margin-bottom: 10px;">
                                    <source src="uploads/video_exercise/${data.video_1}" type="video/mp4">
                                    Trình duyệt của bạn không hỗ trợ video.
                                </video>
                            `);
                        }

                        // Hiển thị video 2
                        if (data.video_2) {
                            videoContainer.append(`
                                <video controls style="width: 350px; margin-bottom: 10px;">
                                    <source src="uploads/video_exercise/${data.video_2}" type="video/mp4">
                                    Trình duyệt của bạn không hỗ trợ video.
                                </video>
                            `);
                        }

                        // Nếu không có video nào
                        if (!data.video_1 && !data.video_2) {
                            videoContainer.append('<p>Không có video hướng dẫn.</p>');
                        }

                        // Mở modal
                        $('#exerciseDetailModal').modal('show');
                    })
                    .catch(error => {
                        Swal.fire(
                            'Lỗi!',
                            'Không thể tải chi tiết bài tập.',
                            'error'
                        );
                    });
            });
        });
    </script>
@endsection
