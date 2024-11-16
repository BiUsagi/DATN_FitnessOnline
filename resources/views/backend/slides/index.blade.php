@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main"  style="min-height: 100vh">
  <div class="pagetitle">
    <h1>Quản lý giao diện </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Quản lý giao diện</li>
        <li class="breadcrumb-item active">Danh sách giao diện</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="title-top d-flex justify-content-between">
                        <h5 class="card-title text-uppercase">Danh sách giao diện</h5>
                        <a href="{{route('admin.slide.create')}}" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm giao diện</a>
                    </div>
                    
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center" >STT</th>
                                <th class="text-center" >Name</th>
                                <th class="text-center" >Mô tả</th>
                                <th class="text-center" >Ảnh</th>
                                <th class="text-center" >Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $index => $slide)
                                <tr>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $slide->name }}</td>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $slide->description }}</td>
                                    <td class="text-center"  style="vertical-align: middle;">
                                        @if($slide->image)
                                            <img src="{{ asset('assets/backend/img/accounts/'.$slide->image) }}" alt="Avatar" width="70" height="70" style="object-fit: contain;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- Nút sửa --}}
                                        <a href="{{ route('admin.slide.update', $slide->id) }}" class="btn btn-warning text-white "><i class="ri-edit-box-line"></i></a>
                                        {{-- <button type="button" class="btn btn-warning text-white" onclick="update({{ $slide->id }})">
                                            <i class="ri-edit-box-line"></i>
                                        </button> --}}
                                        {{-- Nút kích hoạt modal với data-id --}}
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $slide->id }})">
                                            <i class="ri-delete-bin-5-line"></i>
                                        </button>
                                    </td>
                                </tr>
                                <script>

                                    // THÔNG BÁO NÚT XÓA
                                    function confirmDelete(slideId) {
                                        Swal.fire({
                                            title: 'Bạn có chắc chắn muốn xóa không?',
                                            text: "Hành động này không thể hoàn tác!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#d33',
                                            cancelButtonColor: '#3085d6',
                                            confirmButtonText: 'Xóa',
                                            cancelButtonText: 'Hủy'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire({
                                                title: "Thành công!",
                                                text: "Xóa thành công!",
                                                icon: "success"
                                            });
                                                // Nếu xác nhận, chuyển hướng đến trang xóa
                                                window.location.href = "{{ url('admin/slides/xoa/') }}/" + slideId;
                                            }
                                        });
                                    }
                                </script>                                
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
@endsection