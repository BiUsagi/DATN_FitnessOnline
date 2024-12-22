@extends('backend/layouts/app-admin')
@section('main')
   
<main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí khách hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lí khách hàng</li>
                    <li class="breadcrumb-item active">Danh sách khách hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mt-3">Danh Sách khách Hàng</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Khách Hàng</th>
                                        <th>Gói tập</th>
                                        <th data-type="date " class="text-center">Ngày Mua</th>
                                        <th class=" text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_customer as $list)
                                    <tr>
                                        <td>{{  $list->id }}</td>
                                        <td>{{  $list->user->user_name }}</td>
                                        <td>{{  $list->workoutPackage->package_name }}</td>
                                        <td style="text-align:center;">11/11/2024</td>
                                        <td style="text-align:center;">
                                           <a href="/admin/customer_days/{{  $list->workout_package_id }}/{{  $list->user_id }}" class="btn btn-primary text-white" data-bs-title="Xóa lộ trình" ><i class="bi bi-eye-fill"></i></a>                                           
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
