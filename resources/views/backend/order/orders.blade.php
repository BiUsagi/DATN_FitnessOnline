@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Đơn Hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Đơn hàng</li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mt-3">Danh Sách Đơn Hàng</h5>

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="min-width: 130px;">Gói Tập</th>
                                            <th style="min-width: 150px;">Khách Hàng</th>
                                            <th class="text-center" style="min-width: 170px;">Thanh Toán (VND)</th>
                                            <th data-type="date " class="text-center" style="min-width: 130px;">Ngày Mua
                                            </th>
                                            <th class=" text-center" style="min-width: 120px;">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="align-middle">{{ $item->id }}</td>
                                                <td class="align-middle">{{ $item->getWorkoutPackageName() }}</td>
                                                <td class="align-middle">{{ $item->getUserName() }}</td>
                                                <td class="align-middle text-center">
                                                    {{ number_format($item->purchase_price, 0, ',', '.') }}
                                                </td>
                                                <td class="align-middle text-center">{{ $item->created_at }}</td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('admin.info.orders', ['id' => $item->id]) }}"
                                                        class="btn btn-outline-success" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Xem Chi Tiết">
                                                        <i class="ri-eye-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
