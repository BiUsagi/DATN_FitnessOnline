@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí gói tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lý gói tập</li>
                <li class="breadcrumb-item active">Danh sách gói tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách gói tập</h5>
                                <a href="#" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm bài gói tập</a>
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
                                    <th>
                                        <b>Tên gói tập</b>
                                    </th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Giá tiền</th>
                                    <th>Dụng cụ</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                                    <th>Completion</th>
                                </tr>
                            </thead>
                            <tbody>

                                @for ($i = 1; $i<=100; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>Gói trải Nghiệm</td>
                                    <td>gym.jpg</td>
                                    <td>Mô tả gói tập</td>
                                    <td>100.000 VND</td>
                                    <td>Tạ đơn, Máy chạy bộ</td>
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