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
                        <div class="d-flex justify-content-between">    
                            <h5 class="card-title">Danh sách bài tập</h5>
                                <div class="btn btn-info mt-3 button-backend" style="height:40px;"> <a href="{{ route('admin.exercise-create') }}">➕ Thêm bài tập</a></div>
                        </div>
                        <!-- <p>Add lightweight datatables to your project with using the <a
                                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                            wish to conver to a datatable. Check for <a
                                href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more
                                examples</a>.</p> -->

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