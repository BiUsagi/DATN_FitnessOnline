@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Thống kê doanh thu</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Thống kê doanh thu</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên PT</th>
                                <th>Theo tuần</th>
                                <th>Theo tháng</th>
                                <th>Theo năm</th>
                                <th>Tổng thu nhập</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Thanh Rin</td>
                                <td>10.000.000VNĐ</td>
                                <td>20.000.000VNĐ</td>
                                <td>30.000.000VNĐ</td>
                                <td>100.000.000VNĐ</td>
                            </tr>
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