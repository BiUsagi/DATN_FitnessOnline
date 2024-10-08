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
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Ảnh</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SDT</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $index => $slide)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td style="vertical-align: middle;">{{$slide->name_user}}</td>
                                    <td style="vertical-align: middle;">{{$slide->title}}</td>
                                    <td style="vertical-align: middle;">
                                        @if($slide->avatar)
                                        <img src="{{ asset($slide->avatar) }}" alt="Avatar" width="70" height="70"  style="  object-fit: cover;">
                                    @else
                                        No Image
                                    @endif
                                    </td>
                                    <td style="vertical-align: middle;">{{$slide->email}}</td>
                                    <td style="vertical-align: middle;">{{$slide->address}}</td>
                                    <td style="vertical-align: middle;">{{$slide->phone_number}}</td>
                                    <td style="vertical-align: middle;"><button type="button" class="btn btn-success">Sửa</button><button type="button" class="btn btn-danger">xóa</button></td>
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