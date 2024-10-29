@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lý gói tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lý gói tập</li>
                    <li class="breadcrumb-item active">Danh sách gói tập của: </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-top d-flex justify-content-between">
                        <h5 class="card-title text-uppercase">Danh sách lộ trình tập của: </h5>
                        <a href="{{ route('admin.workout_package-create') }}" class="btn-customize"><i
                                class="bi bi-plus-lg"></i> Thêm mới lộ trình tập</a>
                    </div>
                    <div class="box-list">
                        {{-- Show data --}}
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <script>
        $.get('http://127.0.0.1:8000/api/admin/workout_package', function(res){
            let data = res;
            let returnData = '';
            data.forEach(item =>{
                $status = item.status ? 'Ngừng hoạt động' : 'Đang hoạt động';
                returnData += `
                            <div class="card-custom">
                                <div class="card-body-custom">
                                    <div class="image-package">
                                        <img src="uploads/gym_package/${item.image}" alt="">
                                        <div class="box-action">
                                            <a href="/admin/workout_package/workout_package_detail/${item.id}" class="btn-action detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết lộ trình"><i class="bi bi-eye-fill"></i></a>
                                            <a href="/admin/workout_package/update/${item.id}" class="btn-action edit" data-bs-toggle="tooltip" data-bs-title="Chỉnh sửa lộ trình"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn-action delete delete-button" data-bs-toggle="tooltip" data-bs-title="Xóa lộ trình" id="delete-button" data-id = "${item.id}" ><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="content-package">
                                        <a href="#">${item.package_name}</a>
                                        <p>Loại gói tập: ${item.level}</p>
                                        <div class="price-status">
                                            <p class="price">Giá: <span>$${item.price}</span></p>
                                            <p class="status${item.status == 0 ? '-error' : ''}">${item.status == 0 ? 'Ngừng hoạt động' : 'Đang hoạt động'}</p>
                                        </div>
                                        <div class="duration">
                                            <p class="quantity"><i class="bi bi-person-fill"></i> 200 </p>
                                            <p class="quantity"><i class="bi bi-caret-right-square-fill"></i> 200 </p>
                                            <p class="quantity"><i class="bi bi-calendar3"></i> ${item.duration_days}d</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                `;
            });
            $('.box-list').html(returnData);
          
        });

    $(document).ready(function() {
    // Xử lý click cho nút xóa (delete-button)
    $('.delete-button').click(function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của link

      let confirmation = confirm('Bạn có chắc chắn muốn xóa gói tập này không?');
      if (confirmation) {
        let button = $(this); // Lấy nút delete được click

        // Lấy ID của sản phẩm cần xóa từ data-id của nút (nếu có)
        let packageId = button.data('id');
        if (!packageId) {
          console.error('Không tìm thấy ID sản phẩm!');
          return;
        }

        // Gửi yêu cầu DELETE đến server
        fetch(`/api/admin/workout_package/${packageId}`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })
        .then(response => response.json())
        .then(data => {
          // khi xóa thành công
          Swal.fire({
            title: "Thành công!",
            text: "Xóa gói tập thành công!",
            icon: "success"
            });
          // Xóa element của sản phẩm khỏi giao diện
          button.closest('.card-custom').remove();
        })
        .catch(error => {
          // Xử lý khi xóa thất bại
          Swal.fire({
            title: "Lỗi!",
            text: "Có lỗi xảy ra khi xóa gói tập!",
            icon: "error"
             });
        });
      }
    });

    // ... code xử lý các nút khác (detail, edit)
  });
    </script>

@endsection
