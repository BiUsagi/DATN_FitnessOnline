@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Quản lý bài viết</h1>
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
                                            <img src="{{ asset('assets/backend/img/'.$slide->image) }}" alt="Avatar" width="70" height="70" style="object-fit: cover;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- Nút sửa --}}
                                        <a href="{{ route('admin.slide.update', $slide->id) }}" class="btn btn-warning text-white"><i class="ri-edit-box-line"></i></a>
                        
                                        {{-- Nút kích hoạt modal với data-id --}}
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $slide->id }}">
                                            <i class="ri-delete-bin-5-line"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- modal --}}
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa bài viết này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <a href="#" class="btn btn-danger" id="confirmDelete">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var deleteModal = document.getElementById('deleteModal');
                                var confirmDeleteButton = document.getElementById('confirmDelete');
                        
                                deleteModal.addEventListener('show.bs.modal', function (event) {
                                    var button = event.relatedTarget; // Nút kích hoạt modal
                                    var slideId = button.getAttribute('data-id'); // Lấy id từ data-id
                        
                                    // Tạo đường dẫn xóa từ route và gán vào nút xác nhận
                                    var deleteUrl = '{{ route('admin.slide.xoa', ['id' => ':id']) }}'.replace(':id', slideId);
                                    confirmDeleteButton.setAttribute('href', deleteUrl);
                                });
                            });
                        </script>                                                
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>

   
</section>
</main>
@endsection