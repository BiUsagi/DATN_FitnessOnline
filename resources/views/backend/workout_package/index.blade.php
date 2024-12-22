@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lý gói tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lý gói tập</li>
                    @if (auth()->user()->hasRole('admin'))
                        <li class="breadcrumb-item active">Tất cả lộ trình học tập</li>
                    @elseif(auth()->user()->hasRole('staff'))
                        <li class="breadcrumb-item active">Danh sách gói tập của: {{ Auth::user()->user_name }}</li>
                    @endif

                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-top d-flex justify-content-between my">
                        @if (auth()->user()->hasRole('admin'))
                            <h5 class="card-title text-uppercase">Tất cả lộ trình học tập
                            </h5>
                        @elseif(auth()->user()->hasRole('staff'))
                            <h5 class="card-title text-uppercase">Danh sách lộ trình tập của: {{ Auth::user()->user_name }}
                            </h5>
                            <a href="{{ route('admin.workout_package-create') }}" class="btn-customize"><i
                                    class="bi bi-plus-lg"></i> Thêm gói tập</a>
                        @endif

                    </div>

                    <div class="box-list">
                        @foreach ($workout as $w)
                            <div class="card-custom">
                                <div class="card-body-custom">
                                    <div class="image-package">
                                        <img src="uploads/gym_package/{{ $w->image }}" alt="">
                                        <div class="box-action">
                                            <a href="/admin/workout_package/workout_package_detail/{{ $w->id }}"
                                                class="btn-action detail" data-bs-toggle="tooltip"
                                                data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                            <a href="/admin/workout_package/update/{{ $w->id }}"
                                                class="btn-action edit" data-bs-toggle="tooltip"
                                                data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn-action delete delete-button"
                                                data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình" id="delete-button"
                                                data-id = "{{ $w->id }}"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="content-package">
                                        <a href="#">{{ $w->package_name }}</a>
                                        <p>Loại gói tập: {{ $w->level }}</p>
                                        <div class="price-status">
                                            <p class="price">Giá: <span>{{ number_format($w->price, 0, ',', '.') }}
                                                    VND</span></p>
                                            <p class="status{{ $w->status == 0 ? '-error' : '' }}">
                                                {{ $w->status == 0 ? 'Ngừng hoạt động' : 'Đang hoạt động' }}</p>
                                        </div>  
                                        <div class="duration">
                                            <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                            <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                            <p class="quantity"><i class="bi bi-calendar3"></i>{{ $w->duration_days }}d</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <script>
        


        $(document).ready(function() {
            // Xử lý click cho nút xóa (delete-button)
            $('.delete-button').click(function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của link

                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa gói tập này không?',
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
                        let packageId = button.data('id');

                        fetch(`/api/admin/workout_package/${packageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                Swal.fire(
                                    'Đã xóa!',
                                    'Gói tập đã được xóa thành công.',
                                    'success'
                                )
                                button.closest('.card-custom').remove();
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Lỗi!',
                                    'Có lỗi xảy ra khi xóa gói tập.',
                                    'error'
                                )
                            });
                    }
                })
            });
        });
    </script>
@endsection
