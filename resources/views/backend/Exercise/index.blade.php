@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bài tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí bài tập</li>
                <li class="breadcrumb-item active">Danh sách bài tập</li>
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
                                <a href="#" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm bài viết</a>
                            </div>
                            
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên bài tập</th>
                                    <th>
                                        <b>Tên gói tập</b>
                                    </th>
                                    <th>Video bài tập</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 1; $i<=100; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>Bài tập đùi</td>
                                    <td>Gói trải Nghiệm</td>
                                    <td>gym.jpg</td>
                                    <td>31/07/2024</td>
                                    <td>37%</td>
                                </tr>
                                @endfor
                                

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
    
                        </div>
                    </div>
    
                </div>
            </div>
        </section>

</main><!-- End #main -->
@endsection