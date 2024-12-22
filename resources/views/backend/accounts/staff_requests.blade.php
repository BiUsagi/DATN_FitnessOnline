@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Danh sách đơn đăng ký</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item active">Kiếm duyệt hồ sơ</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách hồ sơ</h5>
                            </div>

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center" style="min-width: 170px;">Tên Người Dùng</th>
                                            <th class="text-center" style="min-width: 130px;">ID Cá Nhân</th>
                                            <th class="text-center" style="min-width: 130px;">Ngày Tạo</th>
                                            <th class="text-center">Tình Trạng</th>
                                            <th class="text-center" style="min-width: 130px;">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td class="text-center align-middle">
                                                    {{ $item->id }}
                                                </td>
                                                <td class="text-center  align-middle">
                                                    {{ $item->getUserName() }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $item->user_id }}
                                                </td>
                                                <td class=" align-middle text-center">{{ $item->created_at }}</td>
                                                <td class="align-middle text-center">
                                                    @if ($item->status == 0)
                                                        <span class="badge bg-warning">Chờ Duyệt</span>
                                                    @elseif ($item->status == 1)
                                                        <span class="badge bg-success">Đã Duyệt</span>
                                                    @elseif ($item->status == 2)
                                                        <span class="badge bg-danger">Bị Từ Chối</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{-- xem --}}
                                                    <a href="{{ route('admin.application.info', ['id' => $item->id]) }}"
                                                        class="btn btn-outline-success" data-bs-placement="top"
                                                        data-bs-toggle="tooltip" data-bs-title="Xem Chi Tiết">
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
        </section>

    </main><!-- End #main -->
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
