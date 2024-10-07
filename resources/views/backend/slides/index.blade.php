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
                                <th>Name</th>
                                <th>Title</th>
                                <th>Avatar</th>
                                <th>Avatar</th>
                                <th>Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $slide)
                            <tr>
                                <td>{{$slide->name_user}}</td>
                                <td>{{$slide->title}}</td>
                                <td>{{$slide->avatar}}</td>
                                <td>{{$slide->email}}</td>
                                <td>{{$slide->address}}</td>
                                <td>{{$slide->address}}</td>
                                <td>{{$slide->address}}</td>
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