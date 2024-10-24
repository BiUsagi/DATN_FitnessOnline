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
                                <th class="text-center" >STT</th>
                                <th class="text-center" >Tên</th>
                                <th class="text-center" >ID bài viết</th>
                                <th class="text-center" >content</th>
                                <th class="text-center" >Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($comments as $index => $comment)
                                <tr>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $comment->user->user_name}}</td>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $comment->posts->title}}</td>
                                    <td class="text-center"  style="vertical-align: middle;">{{ $comment->content }}</td>
                                    <td class="text-center"  style="vertical-align: middle;">
                                        {{-- <a href="{{ route('admin.slide.update', $comment->id) }}" class="btn btn-warning text-white"><i class="ri-edit-box-line"></i></a> --}}
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