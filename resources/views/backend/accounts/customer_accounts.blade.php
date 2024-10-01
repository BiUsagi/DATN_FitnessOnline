@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Danh sách nhân viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                    <li class="breadcrumb-item active">Người dùng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách người dùng</h5>
                                {{-- <a href="{{ route('admin.create') }}" class="btn-customize"><i class="bi bi-plus-lg"></i>
                                    Thêm nhân viên</a> --}}
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th>Tên</th>
                                        <th class="text-center">Ảnh</th>
                                        <th>Email</th>
                                        <th class="text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- Lặp hiện thị danh sách nhân viên --}}

                                    @php $stt = 1; @endphp

                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $stt++ }}
                                            </td>
                                            <td>{{ $item->user_name }}</td>
                                            <td class="text-center">
                                                @if ($item->avatar)
                                                    <img src="{{ $item->avatar }}" style="max-width: 100px;">
                                                @else
                                                    <img src="{{ url('assets/backend/img/no-image.jpg') }}"
                                                        style="max-width: 70px;">
                                                @endif
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info text-white"><i
                                                        class="bi bi-eye-fill"></i></button>
                                                <button type="button" class="btn btn-warning text-white"><i
                                                        class="ri-edit-box-line"></i></button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="ri-delete-bin-5-line"></i></button>
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

    </main><!-- End #main -->
@endsection
