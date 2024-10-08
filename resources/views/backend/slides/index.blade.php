@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Quản lý bài viết</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Quản lý bình luận</li>
        <li class="breadcrumb-item active">Danh sách bình luận</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="title-top d-flex justify-content-between">
                        <h5 class="card-title text-uppercase">Danh sách bình luận</h5>
                    </div>
                    
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mô tả</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $index => $slide)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td style="vertical-align: middle;">{{$slide->title}}</td>
                                    <td style="vertical-align: middle;">
                                        @if($slide->image)
                                        <img src="{{ asset($slide->image) }}" alt="Avatar" width="70" height="70"  style="  object-fit: cover;">
                                    @else
                                        No Image
                                    @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- sua --}}
                                        <button type="button" class="btn btn-warning text-white"><i class="ri-edit-box-line"></i></button>
                                                    <a href="{{route('admin.xoa',$slide->id )}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');"  class="btn btn-danger"><i
                                            class="ri-delete-bin-5-line"></i></a>

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
@endsection